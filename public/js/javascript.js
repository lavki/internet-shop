function SelectSize(Element)
{
	var size = Element.value;
	var article = $(Element).parents('.dl-horizontal').children('.article').html();
	var name = $('#panel-title-' + article).html();

	var changeArticle = $(Element).parents('.dl-horizontal').children('.article').css('color', 'red');

	console.log('Size is: ' + size + ', name is: ' + name);

    return false;
}