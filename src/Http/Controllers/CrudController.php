<?php

namespace App\Wire\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;

class CrudController extends WireController
{
	/**
	 * Default views for generating CRUD interface
	 *
	 * @var string
	 */
	public $index_view = 'wire.views.crud.default.index';
	public $create_view = 'wire.views.crud.default.create';
	public $show_view = 'wire.views.crud.default.show';
	public $recycle_view = 'wire.views.crud.default.recycle';
	public $edit_view = 'wire.views.crud.default.edit';

	/**
	 * Show route is being used after an item has been updated or created
	 * @var string
	 */
	public $show_route = '';

	/**
	 * @param $relationships , is being used when item has relationships
	 * @param $success , is being used for determining if any problem has occurred( mainly during validation )
	 * @param $success , is used to define module identifier when a request is done to "wire" prefix
	 * @var array
	 */
	public $relationships = [];
	public $success = true;
	public $identifier = null;

	/**
	 * CrudController constructor.
	 *
	 * allows to define the route identifiers since it's being used in all of the functions in CrudController
	 */
	public function __construct()
	{
		$route = request()->route('identifier');

		if ($route && array_key_exists($route, Cache::get('identifier_classes')))
		{
			$class_name = Cache::get('identifier_classes')[$route];
			$this->identifier = new $class_name;
		}
		else
		{
			$this->identifie = false;
		}
	}

	/**
	 * @param null $route
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index($route)
	{
		if (!$this->identifier)
		{
			return view('wire.views.unknown', ['parameter' => $route]);
		}
		$reproduced_fields = $this->identifier->fields();
		foreach ($reproduced_fields as $key => $value)
		{
			if ($value['type'] == 'belongsTo' && @$value['available_in'] && in_array('index', $value['available_in'], true))
			{
				$this->relationships = [$value['method']];
				$reproduced_fields = $this->belongsToReproduce($reproduced_fields, $key, 'index', false);
			}
		}

		$data = $this->identifier->model::with($this->relationships)->get();
		return view($this->index_view)->with([
			'model' => strtolower(class_basename($this->identifier)),
			'data' => $data,
			'identifier' => $this->identifier,
			'fields' => $reproduced_fields
		]);
	}

	/**
	 * @param null $route
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create($route)
	{
		if (!$this->identifier)
		{
			return view('wire.views.unknown', ['parameter' => $route]);
		}
		$reproduced_fields = $this->reproduceIdentifier($this->identifier, 'create', false, true);

		$response = [
			'model' => strtolower(class_basename($this->identifier)),
			'fields' => $reproduced_fields,
		];

		if (Input::get('parent') && Input::get('id'))
		{
			$response['selected'] = [
				'key' => Input::get('parent'),
				'value' => Input::get('id')
			];
		}

		return view($this->create_view)->with($response);
	}


	/**
	 * @param $route
	 * @param $id
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show($route, $id)
	{
		if (!$this->identifier)
		{
			return view('wire.views.unknown', ['parameter' => $route]);
		}
		$loaded_identifier = $this->loadIdentifier($this->identifier, 'show', true, $id);

		return view($this->show_view, [
			'method' => 'show',
			'data' => $loaded_identifier['data'],
			'model' => strtolower(class_basename($this->identifier)),
			'identifier' => $loaded_identifier['identifier_fields']
		]);
	}


	/**
	 * @param Request $request
	 * @param $route
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(Request $request, $route)
	{
		if (!$this->identifier)
		{
			return view('wire.views.unknown', ['parameter' => $route]);
		}
		$validated = $this->validatedData($this->identifier, $request, "create");

		if ($this->success === true)
		{
			$id = $this->storeAndUpload($validated);
		}
		else
		{
			return redirect()->back()->withInput($request->all())->withErrors($validated['errors']);
		}

		return redirect()->route('wire.show', ['identifier' => $route, 'id' => $id]);
	}

	/**
	 * @param $route
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function restore($route, $id)
	{
		if (!$this->identifier)
		{
			return view('wire.views.unknown', ['parameter' => $route]);
		}
		$record = $this->identifier->model::onlyTrashed()->findOrFail($id)->restore();

		if (!$record)
		{
			$this->success = false;
		}

		$toast_messages = $this->toastMessage('restore');

		return redirect()->back()->with('toast_message', $toast_messages);
	}


	/**
	 * @param $route
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function recycle($route)
	{
		if (!$this->identifier)
		{
			return view('wire.views.unknown', ['parameter' => $route]);
		}
		$reproduced_fields = $this->identifier->fields();

		foreach ($reproduced_fields as $key => $value)
		{
			if ($value['type'] == 'belongsTo' && @$value['available_in'] && in_array('index', $value['available_in'], true))
			{
				$this->relationships = [$value['method']];

				$reproduced_fields = $this->belongsToReproduce($reproduced_fields, $key, 'index', false);
			}
		}

		$data = $this->identifier->model::onlyTrashed()->with($this->relationships)->get();

		return view($this->recycle_view)->with([
			'model' => strtolower(class_basename($this->identifier)),
			'data' => $data,
			'identifier' => $this->identifier,
			'fields' => $reproduced_fields
		]);
	}


	/**
	 * @param $route
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($route, $id)
	{
		if (!$this->identifier)
		{
			return view('wire.views.unknown', ['parameter' => $route]);
		}
		if (Input::get('force_delete'))
		{
			$this->identifier->model::onlyTrashed()->findOrFail($id)->forceDelete();
		}
		else
		{
			$this->identifier->model::findOrFail($id)->delete();
		}

		$toast_messages = $this->toastMessage('delete');

		return redirect()->back()->with('toast_message', $toast_messages);
	}

	/**
	 * @param $route
	 * @param $id
	 * @param null $parameter
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($route, $id, $parameter = null)
	{
		if (!$this->identifier)
		{
			return view('wire.views.unknown', ['parameter' => $route]);
		}
		$reproduced_fields = $this->reproduceIdentifier($this->identifier, 'edit', false, true);

		$loaded_identifier = $this->loadIdentifier($this->identifier, 'show', true, $id);

		return view($this->edit_view)->with([
			'model' => strtolower(class_basename($this->identifier)),
			'fields' => $reproduced_fields,
			'data' => $loaded_identifier['data'],
		]);
	}


	/**
	 * @param $route
	 * @param $id
	 * @param Request $request
	 * @param null $sub_model
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update($route, $id, Request $request, $sub_model = null)
	{
		if (!$this->identifier)
		{
			return view('wire.views.unknown', ['parameter' => $route]);
		}
		$data = $this->identifier->model::find($id);

		if (!$id || !$data)
		{
			abort(404);
		}

		$validated = $this->validatedData($this->identifier, $request, "create", $data);

		if ($this->success === true)
		{
			$id = $this->storeAndUpload($validated, $data);
		}
		else
		{
			return redirect()->back()->withInput($request->all())->withErrors($validated['errors']);
		}

		return redirect()->route('wire.show', ['identifier' => $route, 'id' => $id]);
	}
}
