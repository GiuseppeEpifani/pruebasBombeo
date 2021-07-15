<template>
    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <div :class="{'col-lg-2': hide_card, 'col-lg-5': !hide_card}">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <span>
                                    Registrar prueba
                                </span>
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
                                    <input v-model="data_bomb_test.client" type="email" class="form-control" id="client">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="supervisor">Supervisor</label>
                                    <input v-model="data_bomb_test.supervisor" type="password" class="form-control" id="supervisor">
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
                    <div class="card-header">Pruebas registradas</div>
                    <div class="card-body" style="padding: 0 !important;">
                        <ul class="list-group">
                            <li v-for="item in bomb_tests" class="list-group-item active" aria-current="true">
                                <div class="row">
                                    <div class="col">
                                        {{item.water_well}}
                                    </div>
                                    <div class="col-auto" style="cursor: pointer;" title="Exportar prueba">
                                        <i class="fas fa-download"></i>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div :class="{'col-lg-6': hide_card, 'col-lg-4': !hide_card}">
                <div class="card">
                    <div class="card-header">Ingreso de datos</div>
                    <div class="card-body mx-3">
                        <carousel :per-page="1" :navigationEnabled="true">
                            <slide>
                                <div class="form-group mx-2 mt-4">
                                    <div>
                                        <label for="inputZip">Acumulado</label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>
                                </div>
                            </slide>
                            <slide>
                                <div class="form-group mx-2 mt-4">
                                    <div>
                                        <label for="inputZip">Medicion instantanea (litros/segundos)</label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>
                                </div>
                            </slide>
                            <slide>
                                <div class="form-group mx-2 mt-4">
                                    <div>
                                        <label for="inputZip">Columna de agua</label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>
                                </div>
                            </slide>
                        </carousel>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import { Carousel, Slide } from 'vue-carousel';
    export default {
        data() {
            return {
                hide_card: false,
                bomb_tests: [],
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
                    hours: null,
                    minute: null,
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
                    observation: null
                }
            }
        },
        components: {Carousel, Slide},
        methods: {
            async register_bomb_test() {
                if (this.data_bomb_test.water_well && this.data_bomb_test.well_depth && this.data_bomb_test.client && this.data_bomb_test.ubication && this.data_bomb_test.well_diameter 
                && this.data_bomb_test.proof && this.data_bomb_test.flow && this.data_bomb_test.supervisor && this.data_bomb_test.tube_aforo && this.data_bomb_test.disk_aforo && this.data_bomb_test.meters_well 
                && this.data_bomb_test.hours_init && this.data_bomb_test.latitude && this.data_bomb_test.logitude && this.data_bomb_test.pump_model && this.data_bomb_test.suction_distance) {
                    try {
                        const res = await axios.post('registerBombTest', this.data_bomb_test)
                        console.log(res);
                    } catch (error) {
                        console.log(error);
                    }
                } else {
                    this.$toasted.error('Complete todos los campos', {duration: 800, icon : 'exclamation-triangle'})
                }
            },
            async get_bomb_test() {
                try {
                    const { data } = await axios.get('getBombTest')
                    this.bomb_tests = data;
                    console.log(data);
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
        }
    }
</script>
