document.getElementById("id_categoria").addEventListener("change", form_type);

function form_type() {
    var x = document.getElementById("id_categoria").value;
 

    if (x == "1") {					
        $('#id_sub_categoria').html('<option value="">– Escolheu 1</option>');

       
    }

    if (x == "2") {
        $('#id_sub_categoria').html('<option value="">– Escolheu 2</option>');

    
    }
}
