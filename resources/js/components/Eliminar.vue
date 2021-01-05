<template>
    <div>
        <a class="btn btn-sm btn-danger mr-1 text-white"><em class="fa fa-trash fa-fw" @click="EliminarDato(datos)"></em></a>
    </div>
</template>

<script>
export default {
    data(){
        return{
            datos: [],
            message:''
        }
    },
    methods: {
        getColaborador(){
                let url = '/colaboradors';
                axios.get(url).then(response => {
                    console.log(response.data);
                    this.datos = response.data;
                })
        },
        EliminarDato(datos){

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true
            })

            swalWithBootstrapButtons.fire({
            title: '¿Estas Seguro?',
            html: "Si eliminas el registro de <strong>"+ datos.nombres +"</strong>, <br> ¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Eliminar!',
            cancelButtonText: 'Cancelar!',
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#d33',
            reverseButtons: true
            }).then( async (result) => {
            if (result.value) {

                let url = '/colaboradors/' + datos.id;
                await axios.delete(url).then(response => {
                    this.mensaje = response.data;
                });
                toastr.options = {
                    progressBar : true,
                    closeButton: true
                }
                toastr.success(this.mensaje);

            } else if (
            result.dismiss === Swal.DismissReason.cancel
            ) {
                toastr.error('Acción Cancelada!')
            }
            })
            },
    },
}
</script>