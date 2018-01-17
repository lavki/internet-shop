function SelectSize(Element)
{
	var size = Element.value;
	var article = $(Element).parents('.dl-horizontal').children('.article').html();
	var name = $('#panel-title-' + article).html();

	console.log('Size is: ' + size + ', name is: ' + name);

    return false;
}