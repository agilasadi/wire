<?php
namespace App\Wire\Identifiers;

class BaseIdentifier
{
	public $title = 'id';

	/**
	 * Fields are used for indexing, showing, creating, and updating records
	 *
	 * ---------------------------------------------------type----------------------------------------------------------
	 * ===> type: Each type has it's own component
	 *
	 * ---------------------------------------------------image---------------------------------------------------------
	 * ===> image: image will load the image in index, show, edit views, and will return editable field in create
	 *  and edit views
	 *
	 * -------------------------------------------------belongs_to------------------------------------------------------
	 * ===> belongs_to: is used when the type is select, it means the record belongs to the given module
	 *
	 * ---------------------------------------------------text----------------------------------------------------------
	 * ===> belongs_to: is a regular input field with type of text
	 *
	 * ---------------------------------------------------number--------------------------------------------------------
	 * ===> number: when a field is number, it can have min, max fields
	 *
	 * --------------------------------------------------textarea-------------------------------------------------------
	 * ===> textarea: textarea field is not supposed to be shown in the index page but it should be shown in the show
	 * page.
	 *
	 * ---------------------------------------------straight_attributes-------------------------------------------------
	 * ===> straight_attributes: are inserted in the tag directly, example below:
	 * <input type="{{ $records->fields['type'] }}" {{ $records->fields['straight_attributes'] }}>
	 *
	 * ===> above code will execute the html below
	 * <input type="text" required>
	 */
}
