<template>
    <div class="col-md-12">
        <div class="table-responsive bootgrid">
            <button type="button" class="btn btn-outline-primary float-right mb-2" @click="NuevoDato()">Nuevo</button>
            <table class="table table-striped" id="bootgrid-basic">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">RUC</th>
                        <th scope="col">Razón Social</th>
                        <th scope="col">Dirección</th>
                        <th>Opciones</th>
                        <th>Agregar Contacto</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="dato in datos" :key="dato.id">
                        <td>{{ dato.id }}</td>
                        <td>{{ dato.ruc }}</td>
                        <td>{{ dato.rsocial }}</td>
                        <td>{{ dato.direccion }} </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-info mr-2 command-edit" @click="EditarDato(dato)"><em class="fa fa-edit fa-fw text-white"></em></button>
                            <button type="button" class="btn btn-sm btn-danger command-delete" @click="EliminarDato(dato)"><em class="fa fa-trash fa-fw"></em></button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-success mr-2 command-edit" @click="agregarContacto(dato)"><em class="fa fa-user-plus fa-fw text-white"></em></button>
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
            getClientes(){
                let url = '/clients';
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
                progressSteps: ['1', '2', '3']
            }).queue([
                {
                    title: 'RUC',
                    text:  'Ingresa el número de RUC',
                    input: 'text',
                    inputValidator: (value) => {
                    if (!value) {
                            toastr.error('Debes digitar un nombre para el puesto', 'Error');
                            return ' '
                        }
                    }
                },

                {
                    title: 'Razón Social',
                    text:  'Ingresa la razón social',
                    input: 'text',

                },

                {
                    title: 'Dirección',
                    text:  'Dirección de la empresa',
                    input: 'text',

                },
              ]).then( async (result) => {
                if (result.value) {

                    const datos = {
                        ruc  : result.value[0],
                        rsocial: result.value[1],
                        direccion: result.value[2],
                    }

                    let url = '/clientes';
                    await axios.post(url, datos).then(response => {
                        this.mensaje = response.data;
                    });

                    this.getClientes();
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
            html: "Si eliminas el registro de <strong>"+ dato.rsocial +"</strong>, <br> ¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Eliminar!',
            cancelButtonText: 'Cancelar!',
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#d33',
            reverseButtons: true
            }).then( async (result) => {
            if (result.value) {

                let url = '/clientes/'+dato.id;
                await axios.delete(url).then(response => {
                    this.mensaje = response.data;
                });

                this.getClientes();
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

            let formulario = '<div id="swal2-content" class="swal2-html-container" style="display: block;">RUC</div>'+

                         '<input id="ruc" name="ruc" class="swal2-input" placeholder="" type="text" style="display: flex;">'+
                         
                         '<div id="swal2-content" class="swal2-html-container" style="display: block;">Razón Social</div>'+

                         '<textarea id="rsocial" name="rsocial" class="swal2-input" placeholder="" style="display: flex;"></textarea>' +
                         
                         '<div id="swal2-content" class="swal2-html-container" style="display: block;">Dirección</div>'+

                         '<input id="direccion" name="direccion" class="swal2-input" placeholder="" type="text" style="display: flex;">';

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
                            ruc: document.getElementById('ruc').value,
                            rsocial: document.getElementById('rsocial').value,
                            direccion: document.getElementById('direccion').value,
                        };

                        let url = '/clientes/'+dato.id;
                        await axios.put(url, ultimosdatoseditados).then(response => {
                            this.mensaje = response.data;
                        });

                        this.getClientes();
                        toastr.options = {
                            progressBar : true
                        }
                        return toastr.success(this.mensaje);
                }
            })

                document.getElementById('ruc').value     = dato.ruc;
                document.getElementById('rsocial').value   = dato.rsocial;
                document.getElementById('direccion').value     = dato.direccion;
        },

        agregarContacto(dato){
            console.log(dato);
            Swal.mixin({
                input: 'text',
                confirmButtonText: 'Siguiente &rarr;',
                cancelButtonText: 'Cancelar',
                showCancelButton: true,
                progressSteps: ['1', '2', '3']
            }).queue([
                {
                    title: 'Nombre de Contacto',
                    text:  'Ingrese nombre de contacto',
                    input: 'text',
                    inputValidator: (value) => {
                    if (!value) {
                            toastr.error('Debes digitar el nombre del contacto', 'Error');
                            return ' '
                        }
                    }
                },

                {
                    title: 'Telefóno',
                    text:  'Ingresa el número de telefóno',
                    input: 'number',
                    inputValidator: (value) => {
                    if (!value) {
                            toastr.error('Debes digitar el número de celular', 'Error');
                            return ' '
                        }
                    }

                },

                {
                    title: 'Correo Electronico',
                    text:  'N° de Celular',
                    input: 'email',
                    inputValidator: (value) => {
                    if (!value) {
                            toastr.error('Debes digitar el correo electronico', 'Error');
                            return ' '
                        }
                    }

                },
              ]).then( async (result) => {
                if (result.value) {

                    const datos = {
                        contacto  : result.value[0],
                        telefono:   result.value[1],
                        email:      result.value[2],
                        cliente_id: dato.id
                    }
                    console.log(datos);

                    let url = '/clientes/'+dato.id;
                    await axios.post(url, datos).then(response => {
                        this.mensaje = response.data;
                    });

                    this.getClientes();
                    toastr.options = {
                        progressBar : true
                    }
                    toastr.success(this.mensaje);
                }
              })
            },

        },

        mounted() {
            this.getClientes();
        },

    }
</script>
