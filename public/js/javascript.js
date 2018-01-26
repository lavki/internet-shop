function SelectModification(Element)
{
	var size = Element.value,
		id   = $(Element).attr('data-id');

	$.ajax({
		url: 		'http://internet-shop/ajax',
		type:       'POST',
		dataType:   'json',
		data: 		{'id': id, 'size': size},
		async:      true,
		success: function(data, status)
		{
			$(Element).parents('.dl-horizontal').children('.article').html(data.article);
		},
		error: function(xhr, textStatus, errorThrown)
		{
			alert('Ajax request failed.');
		}
	});
}