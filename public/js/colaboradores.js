$(function () {
    $('#seleccionar-departamento').on('change', onSelectDepartmentChange);

});
function onSelectDepartmentChange()
{
    var departamento_id = $(this).val();
    
    //AJAX

    $.get('/api/departamentos/'+departamento_id+'/provincias', function (data) {
        var html_select = '<option value="">[PROVINCIAS]</option>';
        for (var i = 0; i < data.length; ++i)
            html_select += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
            $('#seleccionar-provincia').html(html_select);
    });
}

$(function () {
    $('#seleccionar-provincia').on('change', onSelectProvinceChange);

});
function onSelectProvinceChange()
{
    var provincia_id = $(this).val();
    
    //AJAX

    $.get('/api/provincias/'+provincia_id+'/distritos', function (data2) {
        var html_select2 = '<option value="">[DISTRITOS]</option>';
        for (var i = 0; i < data2.length; ++i)
            html_select2 += '<option value="'+data2[i].id+'">'+data2[i].name+'</option>';
            $('#seleccionar-distrito').html(html_select2);
    });
}
