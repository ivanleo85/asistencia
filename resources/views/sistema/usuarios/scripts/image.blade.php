<script>
    $(document).ready(function () {
        $('#sexo').change(function (){
            if($('#foto').val() == '' && $("#imgfile").val() == '') {
                if ($('#sexo').val() == 'M')
                    $('#imagen').attr('src','{{ asset('dist/img/male.png') }}');
                else
                    $('#imagen').attr('src','{{ asset('dist/img/female.png') }}');
            }
        });

        $("#imgfile").change(function(event){
            var name = URL.createObjectURL(event.target.files[0]);
            $("#imagen").attr("src",name);
            var foto = $(this).val().split('\\');
            $('#foto').val(foto[2]);
        });
    });
</script>