import { defineStore } from "pinia";


export const useProcesoDeCompraStore = defineStore("procesoDeCompra", {


    state: () => ({
        items: [],
        nombre: "",
        apellido: "",
        email: "",
        direccion: "",
        localidad: "",
        provincia: "",
        codigoPostal: "",
        telefono: "",
        dni: "",
    
    }),


    actions: {
        setNombre(value) {
            this.nombre = value;
        },

        getNombre() {
            return this.nombre;
        },

        setApellido(value) {
            this.apellido = value;
        },

        getApellido() {
            return this.apellido;
        },
        setEmail(value) {
            this.email = value;
        },

        getEmail() {
            return this.email;
        },
        setDireccion(value) {
            this.direccion = value;
        },

        getDireccion() {
            return this.direccion;
        },  
        setLocalidad(value) {
            this.localidad = value;
        },

        getLocalidad() {
            return this.localidad;
        },

        setProvincia(value) {
            this.provincia = value;
        },

        getProvincia() {
            return this.provincia;
        },
        setCodigoPostal(value) {
            this.codigoPostal = value;
        },

        getCodigoPostal() {
            return this.codigoPostal;
        },
        setTelefono(value) {
            this.telefono = value;
        },

        getTelefono() {
            return this.telefono;
        },
        setDni(value) {
            this.dni = value;
        },

        getDni() {
            return this.dni;
        },

        getCompra() {
            return {
                nombre: this.getNombre(),
                apellido: this.getApellido(),
                email: this.getEmail(),
                direccion: this.getDireccion(),
                localidad: this.getLocalidad(),
                provincia: this.getProvincia(),
                codigoPostal: this.getCodigoPostal(),
                telefono: this.getTelefono(),
                dni: this.getDni(),
            };
        },
   
    },
})