<template>
    <div class="col-md-12">
        <div class="table-responsive bootgrid">
            <button type="button" class="btn btn-outline-primary float-right mb-2" @click="NuevoDato()">Nuevo</button>
            <table class="table table-striped" id="bootgrid-basic">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Monto</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="dato in datos" :key="dato.id">
                        <td>{{ dato.id }}</td>
                        <td>{{ dato.descripcion }}</td>
                        <td>{{ dato.monto }}</td>
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
            getPuestos(){
                let url = '/amounts';
                axios.get(url).then(response => {
                    this.datos = response.data;
                })
            },

            NuevoDato(){
            Swal.mixin({
                input: 'text',
                confirmButtonText: 'Siguiente &rarr;',
                cancelButtonText: 'Cancelar',
                showCancelButton: true,
                progressSteps: ['1', '2']
            }).queue([

                {
                    title: 'Descripción',
                    text:  'breve descripción',
                    input: 'text',
                    inputValidator: (value) => {
                    if (!value) {
                            toastr.error('Debes colocar una descripción', 'Error');
                            return ' '
                        }
                    }

                },
                {
                    title: 'Fija el Monto',
                    text:  'Monto',
                    input: 'number',
                    inputValidator: (value) => {
                    if (!value) {
                            toastr.error('Debes digitar un monto', 'Error');
                            return ' '
                        }
                    }
                },

              ]).then( async (result) => {
                if (result.value) {

                    const datos = {
                        descripcion  : result.value[0],
                        monto: result.value[1],
                    }

                    let url = '/montos';
                    await axios.post(url, datos).then(response => {
                        this.mensaje = response.data;
                    });

                    this.getPuestos();
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
            html: "Si eliminas el registro con descripción <strong>" + dato.descripcion + " con el monto de S/." + dato.monto +"</strong>, <br> ¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Eliminar!',
            cancelButtonText: 'Cancelar!',
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#d33',
            reverseButtons: true
            }).then( async (result) => {
            if (result.value) {

                let url = '/montos/'+dato.id;
                await axios.delete(url).then(response => {
                    this.mensaje = response.data;
                });

                this.getPuestos();
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

            let formulario = '<div id="swal2-content" class="swal2-html-container" style="display: block;">Descripcion</div>'+

                         '<textarea id="descripcion" name="descripcion" class="swal2-input" placeholder="" style="display: flex;"></textarea>'+
                         
                         '<div id="swal2-content" class="swal2-html-container" style="display: block;">Monto</div>'+

                         '<input id="monto" name="monto" class="swal2-input" placeholder="" type="number" style="display: flex;">';

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
                            monto: document.getElementById('monto').value,
                            descripcion: document.getElementById('descripcion').value,
                        };

                        let url = '/montos/'+dato.id;
                        await axios.put(url, ultimosdatoseditados).then(response => {
                            this.mensaje = response.data;
                        });

                        this.getPuestos();
                        toastr.options = {
                            progressBar : true
                        }
                        return toastr.success(this.mensaje);
                }
            })

                document.getElementById('monto').value     = dato.monto;
                document.getElementById('descripcion').value   = dato.descripcion;
        }
        },

        mounted() {
            this.getPuestos();
        },

    }
</script>
