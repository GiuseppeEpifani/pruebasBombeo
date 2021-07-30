<template>
    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <div :class="{'col-lg-2': hide_card, 'col-lg-5': !hide_card}">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <strong>Registrar prueba</strong>            
                            </div>
                            <div v-if="!hide_card" class="col-auto" style="cursor: pointer" @click="hide_show_card_register(true)">
                                <i class="fas fa-eye-slash"></i>
                            </div>
                            <div v-if="hide_card" class="col-auto" style="cursor: pointer" @click="hide_show_card_register(false)">
                                <i class="fas fa-eye"></i>
                            </div>
                        </div>
                    </div>
                    <div v-if="!hide_card" class="card-body px-4">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="client">Cliente</label>
                                    <input v-model="data_bomb_test.client" type="text" class="form-control" id="client">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="supervisor">Supervisor</label>
                                    <input v-model="data_bomb_test.supervisor" type="text" class="form-control" id="supervisor">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="water_well">Nombre pozo</label>
                                    <input v-model="data_bomb_test.water_well" type="text" class="form-control" id="water_well">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="ubication">Ubicación</label>
                                    <input v-model="data_bomb_test.ubication" type="text" class="form-control" id="ubication">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="well_diameter">Diametro del pozo</label>
                                    <input v-model="data_bomb_test.well_diameter" type="number" class="form-control" id="well_diameter">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="proof">Tipo de prueba</label>
                                    <input v-model="data_bomb_test.proof" type="text" class="form-control" id="proof">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="meters_well">Diferencia borde suelo</label>
                                    <input v-model="data_bomb_test.meters_well" type="number" class="form-control" id="meters_well">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="flow">Caudal</label>
                                    <input v-model="data_bomb_test.flow" type="number" class="form-control" id="flow">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="hours_init">Hora de inicio</label>
                                    <input v-model="data_bomb_test.hours_init" type="text" class="form-control" id="hours_init">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="tube_aforo">Tubo de aforo</label>
                                    <input v-model="data_bomb_test.tube_aforo" type="number" class="form-control" id="inputube_aforotZip">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="disk_aforo">Disco aforo</label>
                                    <input v-model="data_bomb_test.disk_aforo" type="number" class="form-control" id="disk_aforo">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="well_depth">Profundidad del pozo</label>
                                    <input v-model="data_bomb_test.well_depth" type="number" class="form-control" id="well_depth">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="latitude">Latitud</label>
                                    <input v-model="data_bomb_test.latitude" type="number" class="form-control" id="latitude">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="logitude">Longitud</label>
                                    <input v-model="data_bomb_test.logitude" type="number" class="form-control" id="logitude">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="pump_model">Modelo de bomba</label>
                                    <input v-model="data_bomb_test.pump_model" type="text" class="form-control" id="pump_model">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="suction_distance">Distancia de succión</label>
                                    <input v-model="data_bomb_test.suction_distance" type="number" class="form-control" id="suction_distance">
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" @click="register_bomb_test">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div :class="{'col-lg-4': hide_card, 'col-lg-3': !hide_card}">
                <div class="card">
                    <div class="card-header"><strong>Pruebas registradas</strong></div>
                    <div class="card-body" style="padding: 0 !important;">
                        <ul class="list-group">
                            <template v-for="item in bomb_tests">
                                <li class="list-group-item" :class="{'active': bomb_test.id == item.id}" aria-current="true" style="cursor: pointer;">
                                    <div class="row" @click="select_bomb_test(item)">
                                        <div class="col">
                                            Pozo: <strong>{{item.water_well}}</strong> - Supervisor: <strong>{{item.supervisor}}</strong>
                                        </div>
                                        <div class="col-auto" style="cursor: pointer;" title="Exportar prueba">
                                            <button type="button" class="btn btn-danger" @click="delete_bomb_test(item)"><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </div>
                                </li>
                            </template>
                        </ul>
                    </div>
                    <div class="card-body mx-3 d-flex justify-content-center" v-if="bomb_tests.length == 0 ">
                        <strong class="align-self-center">Sin pruebas registradas</strong>
                    </div>
                </div>
            </div>
            <div :class="{'col-lg-6': hide_card, 'col-lg-4': !hide_card}">
                <div class="card">
                    <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <strong>Ingreso de datos</strong>
                                </div>
                                <div class="col-auto" style="cursor: pointer" v-if="bomb_tests.length > 0 && bomb_test.status == 1">
                                    <button type="button" class="btn btn-success" @click="finally_bomb_test">Finalizar prueba</button>
                                </div>
                        </div>
                    </div>
                    <div class="card-body mx-3" v-if="bomb_tests.length > 0 && bomb_test.status == 1">
                        <carousel :per-page="1" :navigationEnabled="true">
                            <slide>
                                <div class="form-group mx-2 mt-4">
                                    <div>
                                        <label for="accumulated">Acumulado*</label>
                                        <input v-model="data_bomb_test_field.accumulated" type="number" class="form-control" id="accumulated">
                                    </div>
                                </div>
                            </slide>
                            <slide>
                                <div class="form-group mx-2 mt-4">
                                    <div>
                                        <label for="instant_measurement">Medicion instantanea (litros/segundos)*</label>
                                        <input v-model="data_bomb_test_field.instant_measurement" type="number" class="form-control" id="instant_measurement">
                                    </div>
                                </div>
                            </slide>
                            <slide>
                                <div class="form-group mx-2 mt-4">
                                    <div>
                                        <label for="pressure_psi">Presión (psi)*</label>
                                        <input v-model="data_bomb_test_field.pressure_psi" type="number" class="form-control" id="pressure_psi">
                                    </div>
                                </div>
                            </slide>
                            <slide>
                                <div class="form-group mx-2 mt-4">
                                    <div>
                                        <label for="temperature">Temperatura(C°)</label>
                                        <input v-model="data_bomb_test_field.temperature" type="number" class="form-control" id="temperature">
                                    </div>
                                </div>
                            </slide>
                            <slide>
                                <div class="form-group mx-2 mt-4">
                                    <div>
                                        <label for="ph">PH</label>
                                        <input v-model="data_bomb_test_field.ph" type="number" class="form-control" id="ph">
                                    </div>
                                </div>
                            </slide>
                            <slide>
                                <div class="form-group mx-2 mt-4">
                                    <div>
                                        <label for="inputZip">Conductividad(uS)</label>
                                        <input v-model="data_bomb_test_field.conduct" type="number" class="form-control" id="inputZip">
                                    </div>
                                </div>
                            </slide>
                            <slide>
                                <div class="form-group mx-2 mt-4">
                                    <div>
                                        <label for="ppm">PPM</label>
                                        <input v-model="data_bomb_test_field.ppm" type="number" class="form-control" id="ppm">
                                    </div>
                                </div>
                            </slide>
                            <slide>
                                <div class="form-group mx-2 mt-4">
                                    <div>
                                        <label for="tds">TDS/Imhoff(ml/L)</label>
                                        <input v-model="data_bomb_test_field.tds" type="number" class="form-control" id="tds">
                                    </div>
                                </div>
                            </slide>
                            <slide>
                                <div class="form-group mx-2 mt-4">
                                    <div>
                                        <label for="turbidity">Turbiedad</label>
                                        <input v-model="data_bomb_test_field.turbidity" type="number" class="form-control" id="turbidity">
                                    </div>
                                </div>
                            </slide>
                            <slide>
                                <div class="form-group mx-2 mt-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="observation">Observaciónes</label>
                                            <input v-model="data_bomb_test_field.observation" type="text" class="form-control" id="observation">
                                        </div>
                                        <div class="col-12 mt-3">
                                            <button type="button" class="btn btn-primary btn-block" @click="register_field_bomb_test">Registrar datos</button>
                                         </div>
                                    </div>
                                </div>
                            </slide>
                        </carousel>
                    </div>
                    <div class="card-body mx-3 d-flex justify-content-center" v-if="bomb_tests.length > 0 && bomb_test.status == 2">
                        <strong class="align-self-center">La prueba ya ha sido finalizada.</strong>
                    </div>
                    <div class="card-body mx-3 d-flex justify-content-center" v-if="bomb_tests.length == 0 ">
                        <strong class="align-self-center">Sin pruebas registradas</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import { Carousel, Slide } from 'vue-carousel';
    import buttonGenerateReport from './buttonGenerateReport';
        export default {
        data() {
            return {
                hide_card: false,
                bomb_tests: [],
                bomb_test: {},
                data_bomb_test: {
                    water_well: null,
                    well_depth: null,
                    client: null,
                    ubication: null,
                    well_diameter: null,
                    proof: null,
                    flow: null,
                    supervisor: null,
                    tube_aforo: null,
                    disk_aforo: null,
                    meters_well: null,
                    hours_init: null,
                    latitude: null,
                    logitude: null,
                    pump_model: null,
                    suction_distance: null
                },
                data_bomb_test_field: {
                    accumulated: null,
                    instant_measurement: null,
                    water_column: null,
                    pressure_psi: null,
                    measured_from_edge: null,
                    temperature: null,
                    ph: null,
                    conduct: null,
                    ppm: null,
                    tds: null,
                    turbidity: null,
                    observation: null,
                    bomb_test_id: null
                },
            }
        },
        components: {Carousel, Slide, buttonGenerateReport},
        methods: {
            select_bomb_test(item) {
                this.bomb_test = item;
            },
            async register_bomb_test() {
                if (this.data_bomb_test.water_well && this.data_bomb_test.well_depth && this.data_bomb_test.client && this.data_bomb_test.ubication && this.data_bomb_test.well_diameter 
                && this.data_bomb_test.proof && this.data_bomb_test.flow && this.data_bomb_test.supervisor && this.data_bomb_test.tube_aforo && this.data_bomb_test.disk_aforo && this.data_bomb_test.meters_well 
                && this.data_bomb_test.hours_init && this.data_bomb_test.latitude && this.data_bomb_test.logitude && this.data_bomb_test.pump_model && this.data_bomb_test.suction_distance) {
                    try {
                        const {data} = await axios.post('registerBombTest', this.data_bomb_test)
                        this.data_bomb_test = {
                                water_well: null,
                                well_depth: null,
                                client: null,
                                ubication: null,
                                well_diameter: null,
                                proof: null,
                                flow: null,
                                supervisor: null,
                                tube_aforo: null,
                                disk_aforo: null,
                                meters_well: null,
                                hours_init: null,
                                latitude: null,
                                logitude: null,
                                pump_model: null,
                                suction_distance: null
                        };
                        this.bomb_tests = data;
                        this.bomb_test = data[0];
                        this.$toasted.success('Prueba registrada', {duration: 800, icon : 'check'})
                    } catch (error) {
                        console.log(error);
                    }
                } else {
                    this.$toasted.error('Complete todos los campos', {duration: 800, icon : 'exclamation-triangle'})
                }
            },
            async register_field_bomb_test() {
                if (this.data_bomb_test_field.accumulated && this.data_bomb_test_field.pressure_psi && this.data_bomb_test_field.instant_measurement) {
                    this.data_bomb_test_field.bomb_test_id = this.bomb_test.id;
                    try {
                        await axios.post('registerFieldBombTest', this.data_bomb_test_field);
                        this.data_bomb_test_field = {
                            accumulated: null,
                            instant_measurement: null,
                            water_column: null,
                            pressure_psi: null,
                            measured_from_edge: null,
                            temperature: null,
                            ph: null,
                            conduct: null,
                            ppm: null,
                            tds: null,
                            turbidity: null,
                            observation: null,
                            bomb_test_id: null
                        };
                        this.$toasted.success('Campos registrados', {duration: 800, icon : 'check'})
                    } catch (error) {
                        console.log(error);
                    }
                } else {
                    this.$toasted.error('Complete todos los campos obligatorios', {duration: 800, icon : 'exclamation-triangle'})
                }
            },
            async finally_bomb_test() {
                const {data} = await axios.post('finallyBombTest', this.bomb_test);
                this.bomb_tests = data;
                this.bomb_test = this.bomb_tests[0];
                this.$toasted.success('Prueba finalizada', {duration: 800, icon : 'check'})
            },
            async delete_bomb_test(item) {
                const {data} = await axios.post('deleteBombTest', item);
                this.bomb_tests = data;
                this.bomb_test = (this.bomb_tests[0]) ? this.bomb_tests[0] : {};
                this.$toasted.success('Prueba eliminada', {duration: 800, icon : 'check'})
            },
            async get_bomb_test() {
                try {
                    const { data } = await axios.get('getBombTest')
                    this.bomb_tests = data;
                } catch (error) {
                    console.log(error);
                }
            },
            hide_show_card_register(action) {
                this.hide_card = action;
            }
        },
        async mounted() {
            await this.get_bomb_test();
            this.bomb_test = this.bomb_tests[0];
        }
    }
</script>
