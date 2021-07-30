<template>
    <div class="p-1">
        <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h2 class="ml-3 mt-4 mb-2"><i class="fas fa-file-alt"></i> Pruebas</h2>
            </div>
            <div class="col-auto">
                <input v-model="search" type="text" class="form-control mt-4 mb-2 mr-4" placeholder="Buscar por nombre pozo">
            </div>
        </div>
        </div>
        <div class="container-fluid">
            <template v-if="loading">
                <div class="card">
                    <div class="card-body text-center">
                        <strong>Cargando...</strong>
                    </div>
                </div>
            </template>
            <template v-if="bomb_tests.length > 0 && !loading">
                <div v-for="test in bomb_tests" class="card">
                    <div class="card-header">
                        Pozo: <strong>{{test.water_well}}</strong> / <i class="fas fa-user-cog mr-2"></i> Supervisor: <strong>{{test.supervisor}}</strong> / <i class="fas fa-user-alt mx-2"></i> Cliente: <strong>{{test.client}}</strong>                
                    </div>
                    <div class="card-body px-4">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                Ubicación: <strong>{{test.ubication}}</strong>  
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                Diametro del pozo: <strong>{{test.well_diameter}}</strong>  
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                Tipo de prueba: <strong>{{test.proof}}</strong>  
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                Dif. borde suelo: <strong>{{test.meters_well}}</strong>  
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                Caudal: <strong>{{test.flow}}</strong>  
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                Hora inicio: <strong>{{test.hours_init}}</strong>  
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                Tubo de aforo: <strong>{{test.tube_aforo}}</strong>  
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                Disco aforo: <strong>{{test.disk_aforo}}</strong>  
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                Profundidad del pozo: <strong>{{test.well_depth}}</strong>  
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                Latitud: <strong>{{test.latitude}}</strong>  
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                Longitud: <strong>{{test.logitude}}</strong>  
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                Modelo de bomba: <strong>{{test.pump_model}}</strong>  
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                Distancia de succión: <strong>{{test.suction_distance}}</strong>  
                            </div>
                        </div>
                        <hr/>
                        <template v-if="field_bomb_tests.filter(item => item.bomb_test_id == test.id).length > 0">
                            <div class="row" v-for="(field, index) in field_bomb_tests.filter(item => item.bomb_test_id == test.id)">
                                <div class="col-12">
                                    <h5><strong>N° muestra {{index + 1}} / Minuto {{index + 1}}</strong></h5>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    Acumulado: <strong>{{field.accumulated}}</strong>  
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    Medicion instantanea (litros/segundos): <strong>{{field.instant_measurement ? field.instant_measurement : 'Omitido'}}</strong>  
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    Presión (psi): <strong>{{field.pressure_psi ? field.pressure_psi : 'Omitido'}}</strong>  
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    Temperatura(C°): <strong>{{field.temperature ? field.temperature : 'Omitido'}}</strong>  
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    PH: <strong>{{field.ph ? field.ph : 'Omitido'}}</strong>  
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    Conductividad(uS): <strong>{{field.conduct ? field.conduct : 'Omitido'}}</strong>  
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    PPM: <strong>{{(field.ppm) ? field.ppm : 'Omitido'}}</strong>  
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    TDS/Imhoff(ml/L): <strong>{{field.tds ? field.tds : 'Omitido'}}</strong>  
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    Turbiedad: <strong>{{field.turbidity ? field.turbidity : 'Omitido'}}</strong>  
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    Observaciónes: <strong>{{field.observation ? field.observation : 'Omitido'}}</strong>  
                                </div>
                            </div>
                        </template>
                        <template>
                            <strong>Sin campos registrados</strong>
                        </template>
                    </div>
                    <div class="card-footer">
                        Creado el: <strong>{{format_date_human(test.created_at)}}</strong>                
                    </div>
                </div>
            </template>
            <template v-if="bomb_tests.length == 0 && !loading">
                <div class="card">
                    <div class="card-body text-center">
                        <strong>No hay pruebas registradas</strong>
                    </div>
                </div>
            </template>
        </div>
    </div>
</template>

<script>
import { formatDateHuman } from '../../helpers/formatDateHuman';
export default {
    data() {
        return {
            bomb_tests: [],
            backup_bombs_test: [],
            field_bomb_tests: [],
            search: '',
            loading: false
        }
    },

    watch: {
        search: function() {
            this.filter();
        },
    },

    components: {},

    methods: {
        async filter() {
            this.loading = true;
            setTimeout(() => {
                
                this.bomb_tests = this.backup_bombs_test;
                this.bomb_tests = this.bomb_tests.filter(test => {
                    let name = test.water_well;
                    return name.indexOf(this.search) > -1;
                });
                this.loading = false;

            }, 200);
        },

        async get_bomb_test() {
            try {
                const { data } = await axios.get('getBombTest');
                this.bomb_tests = data;
                this.backup_bombs_test = data;
            } catch (error) {
                console.log(error);
            }
        },

        async get_field_bomb_test() {
            try {
                const { data } = await axios.get('getFieldBombTest');
                this.field_bomb_tests = data;
            } catch (error) {
                console.log(error);
            }
        },

        format_date_human(date) {
            return formatDateHuman(date, 'YYYY-MM-DD HH:mm:ss', 'HH:mm a, DD MMMM - YYYY');  
        }
    },

    async mounted() {
        await this.get_bomb_test();
        await this.get_field_bomb_test();
    },
}
</script>