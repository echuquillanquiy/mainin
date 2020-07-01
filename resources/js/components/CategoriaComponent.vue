<template>
    <div class="col-md-12">
        <div class="table-responsive bootgrid">
            <button type="button" class="btn btn-outline-primary float-right mb-2" @click="NuevoDato()">Nuevo</button>
            <table class="table table-striped" id="bootgrid-basic">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre de la Categoría</th>
                        <th scope="col"></th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="dato in datos" :key="dato.id">
                        <td>{{ dato.id }}</td>
                        <td>{{ dato.nombre }}</td>
                        <td>{{ dato.descripcion }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-info mr-2 command-edit" @click="EditarDato(dato)"><em class="fa fa-edit fa-fw text-white"></em></button>
                            <button type="button" class="btn btn-sm btn-danger command-delete" @click="EliminarDato(dato)"><em class="fa fa-trash fa-fw"></em></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                datos: [],
                message: ''
            }
        },
        methods: {
            getCategorias(){
                let url = '/categories';
                axios.get(url).then(response => {
                    this.datos = response.data;
                })
            },

            NuevoDato(){
            Swal.mixin({
                input: 'text',
                confirmButtonText: 'Enviar &rarr;',
                cancelButtonText: 'Cancelar',
                showCancelButton: true,
                progressSteps: ['1']
            }).queue([
                {
                    title: 'Nombre de la Categoría',
                    text:  'Categoría',
                    input: 'text',
                    inputValidator: (value) => {
                    if (!value) {
                            toastr.error('Debes digitar un nombre para la Categoría', 'Error');
                            return ' '
                        }
                    }
                },
              ]).then( async (result) => {
                if (result.value) {

                    const datos = {
                        nombre  : result.value[0],
                        descripcion: result.value[1],
                    }

                    let url = '/categorias';
                    await axios.post(url, datos).then(response => {
                        this.mensaje = response.data;
                    });

                    this.getCategorias();
                    toastr.options = {
                        progressBar : true
                    }
                    toastr.success(this.mensaje);
                }
              })
            },

            EliminarDato(dato){

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true
            })

            swalWithBootstrapButtons.fire({
            title: '¿Estas Seguro?',
            html: "Si eliminas el registro de <strong>"+ dato.nombre +"</strong>, <br> ¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Eliminar!',
            cancelButtonText: 'Cancelar!',
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#d33',
            reverseButtons: true
            }).then( async (result) => {
            if (result.value) {

                let url = '/categorias/'+dato.id;
                await axios.delete(url).then(response => {
                    this.mensaje = response.data;
                });

                this.getCategorias();
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

        EditarDato(dato){
            console.log(dato);

            let formulario = '<div id="swal2-content" class="swal2-html-container" style="display: block;">Nombre del Puesto</div>'+

                         '<input id="nombre" name="nombre" class="swal2-input" placeholder="" type="text" style="display: flex;">';

                Swal.fire({
                title: 'Editar Registro',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Guardar',
                html: formulario,
                focusConfirm: false,
                preConfirm: async () => {

                        let ultimosdatoseditados = {
                            nombre: document.getElementById('nombre').value,
                        };

                        let url = '/categorias/'+dato.id;
                        await axios.put(url, ultimosdatoseditados).then(response => {
                            this.mensaje = response.data;
                        });

                        this.getCategorias();
                        toastr.options = {
                            progressBar : true
                        }
                        return toastr.success(this.mensaje);
                }
            })

                document.getElementById('nombre').value     = dato.nombre;
        }
        },

        mounted() {
            this.getCategorias();
        },

    }
</script>
