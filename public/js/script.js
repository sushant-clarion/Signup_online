/* Author:

*/


function toggle_fields() {

$('#child_care').click(function() {
    $("#child_care_group").toggle(this.checked);
});

$('#same_address').click(function() {
	if ($('#same_address').is(':checked'))
	{
		$('#address_group').hide();
	}
	else
	{
		$('#address_group').show();
	}
});

$('#recurring_same').click(function() {
	if ($('#recurring_same').is(':checked'))
	{
		$('#recurring_payment_group').hide();
	}
	else
	{
		$('#recurring_payment_group').show();
	}
});

}

