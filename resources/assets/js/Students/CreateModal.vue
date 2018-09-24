<template>
    <div>
        
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog xl-model">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">
                            <slot name="header">
                                default header
                            </slot>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a class="persistant-disabled" href="#stepper-step-1" data-toggle="tab"
                                       aria-controls="stepper-step-1" role="tab" title="Step 1"> <span
                                            class="round-tab glyphicon glyphicon-book gray-border">1</span> </a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <a class="persistant-disabled" href="#stepper-step-2" data-toggle="tab"
                                       aria-controls="stepper-step-2" role="tab" title="Step 2" ref="navTab2"> <span
                                            class="round-tab glyphicon glyphicon-pencil gray-border">2</span> </a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <a class="persistant-disabled" href="#stepper-step-3" data-toggle="tab"
                                       aria-controls="stepper-step-3" role="tab" title="Step 3" ref="navTab3"> <span
                                            class="round-tab glyphicon glyphicon-list-alt gray-border">3</span> </a>
                                </li>
                            </ul>
                        </div>
                        <br>
                        <hr>
                        <div class="tab-content no-border">
                            <form class="tab-pane fade in active" role="tabpanel" id="stepper-step-1"
                                  ref="stepForm1">
                                <div class="action">
                                    <div class="personal-info form-group row">
                                        <div class="col-xs-6">
                                            <input type="text" name="student_first_name" id="student_first_name"
                                                   class="form-control" placeholder="Student’s First Name" required
                                                   v-model="studentInfo.first_name">
                                        </div>
                                        <div class="col-xs-6">
                                            <input type="text" name="student_Last name" id="student_last_name"
                                                   class="form-control" placeholder="Student’s Last Name" required
                                                   v-model="studentInfo.last_name">
                                        </div>
                                    </div>
                                    <div class="personal-info form-group row">
                                        <div class="col-xs-6">
                                            <input type="text" class="form-control"
                                                   placeholder="Student’s Middle Name (Optional)">
                                        </div>
                                        <div class="col-xs-6">
                                            <label>Select Birthdate</label>
                                            <form class="form-inline">
                                                
                                                <div class="form-group">
                                                    <select class="form-control" required
                                                            id="dobmonth"></select>
                                                </div>
                                                <div class="form-group">
                                                    <select class="form-control" required id="dobday"></select>
                                                </div>
                                                <div class="form-group">
                                                    <select class="form-control" required id="dobyear"></select>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="options form-group row">
                                        <div class="col-md-6 form-group">
                                            <label class="radio-inline"><input type="radio" name="gender"
                                                                               id="gender-female" required
                                                                               v-model="studentInfo.gender_id"
                                                                               :value="1">Male</label>
                                            <label class="radio-inline"><input type="radio" name="gender"
                                                                               id="gender-male" required
                                                                               v-model="studentInfo.gender_id"
                                                                               :value="2">Female</label>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12 form-group">
                                            <select name="ethnicity" id="ethnicity" class="form-control"
                                                    v-model="studentInfo.ethnicity_id">
                                                <option value="0">Ethnicity(optional)</option>
                                                <option value="">American Indian / Alaskan Native</option>
                                                <option value="">Asian</option>
                                                <option value="">Black</option>
                                                <option value="">Pacific Island / Native Hawian</option>
                                                <option value="">White</option>
                                                <option value="">Hispanic</option>
                                                <option value="">2 or more combination</option>
	                                            
                                            </select>
                                            
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12 form-group">
                                            <select name="iep" id="iep" class="form-control"
                                                    v-model="studentInfo.iep_id">
                                                <option value="0">IEP(optional)</option>
                                                <option v-for="iep in options.ieps" :value="iep.id" :key="iep.id">
                                                    {{iep.contents}}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div v-if="options.userRole < 4" class="form-group row">
                                        <div class="col-xs-8 col-xs-offset-2">
                                            <select name="designateMentor" id="designateMentor" class="form-control"
                                                    v-model="studentInfo.mentor">
                                                <option v-for="mentor in options.availableMentors"
                                                        :value="mentor.id" :key="mentor.id">
                                                    {{mentor.last_name}}, {{mentor.first_name}}
                                                </option>
                                                <option value="0" selected>Designate Mentor(No Selected)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div v-if="options.userRole < 3" class="form-group row">
                                        <div class="col-xs-8 col-xs-offset-2">
                                            <select name="school" id="school" class="form-control" required
                                                    v-model="studentInfo.school_id" min='1'>
                                                <option v-for="school in options.availableSchools"
                                                        :value="school.id" :key="school.id">{{school.name}}
                                                </option>
                                                <option value="0" selected>School(No Selected)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-8 col-xs-offset-2">
                                            <input type="text" placeholder="Create Student’s iConnect Username" class="form-control"
                                                   v-model="studentInfo.username" name="username" id="username"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-8 col-xs-offset-2">
                                            <input type="password" placeholder="Create Student’s iConnect Username"
                                                   class="form-control" v-model="studentInfo.password"
                                                   name="password" id="password" :required="studentId==0">
                                        </div>
                                    </div>
                                    <v-layout justify-center>
                                        <button type="submit"
                                                class="btn btn-lg btn-cta btn-lightblue next iconnect-blue"
                                                @click="gotoStep2($event)">Next Step 2
                                        </button>
                                    </v-layout>
                                </div>
                            </form>
                            <div class="tab-pane fade" role="tabpanel" id="stepper-step-2">
                                <span>Monitoring and Citizenship</span>
                                <citizenship-value-fields
                                        :selectedLocationIds="selectedLocationIds"
                                        :selectedPromptIds="selectedPromptIds"
                                        :locationLabels="locationLabels"
                                        :useVariableInterval="useVariableInterval"
                                        :desiredMeanInSeconds="desiredMeanInSeconds"
                                        :intervalHours="intervalHours"
                                        :intervalMinutes="intervalMinutes"
                                        :intervalSeconds="intervalSeconds"
                                        :customPrompts="customPrompts"
                                        :goalPercent="goalPercent"
                                        @update="onMonitoringUpdate"
                                        :monitoring-location-names-by-id="options.monitoringLocationNamesById"
                                        :monitoring-locations-by-category="options.monitoringLocationsByCategory"
                                        :citizenship-values-by-type="options.citizenshipValuesByType">
                                </citizenship-value-fields>
                                <a class="btn btn-lg btn-cta btn-lightblue next"
                                   @click="gotoStep3()">Next Step 3</a>

                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="stepper-step-3">
                                <h2>Add stakeholder(s)</h2>
                                <div class="action">
                                    <div class="personal-info row" v-for="i in 3" :key="i">
                                        <div class="col-xs-2 col-md-2 form-group">
                                            <input type="text" :id="'stakeholder' + i + '_first_name'"
                                                   class="form-control" placeholder="First name">
                                        </div>
                                        <div class="col-xs-2 col-md-2 form-group">
                                            <input type="text" :id="'stakeholder' + i + '_last_name'"
                                                   class="form-control" placeholder="Last name">
                                        </div>
                                        <div class="col-xs-2 col-md-2 form-group">
                                            <input type="text" :id="'stakeholder' + i + '_email'"
                                                   class="form-control" placeholder="Email Address">
                                        </div>
                                        <div class="col-xs-2 col-md-2 form-group">
                                            <select id="relationship" class="form-control">
                                                <option value="" disabled selected>Relationship</option>
                                            </select>
                                        </div>
                                        <span><button class="btn btn-cta btn-green ee">Enable</button></span>
                                        <span><button style="background:yellow;" class="btn btn-cta btn-green dd">Desable</button></span>
                                    </div>
                                </div>
                                <div>
                                    <a class="btn btn-lg btn-cta btn-lightblue next"
                                       @click="submit()">Save new student!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Exit Add new Student (Does NOT save)
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    // import DatePicker from 'vue2-datepicker'
    import Axios from 'axios';

    export default {
        name: "create-modal",
        props: {
            actionurl: {
                type: String,
            },
            studentId: 0,
        },
        data: function () {
            return {
                options: {},
                studentInfo: {
                    first_name: '',
                    middle_name: null,
                    last_name: '',
                    birthdate: '',
                    gender_id: 0,
                    ethnicity_id: 0,
                    iep_id: 0,
                    mentor: 0,
                    school_id: 0,
                    // for Citzenship Value Field
                    monitoringLocations: [],
                    locationLabels: [],
                    citizenshipValues: [],
                    isVariableInterval: [],
                    desiredMeanInSeconds: [],
                    intervalHours: [],
                    intervalMinutes: [],
                    intervalSeconds: [],
                    customPrompts: [],
                    goals: [],
                },

                selectedLocationIds: [],
                locationLabels: [],
                selectedPromptIds: [],
                useVariableInterval: [],
                desiredMeanInSeconds: [],
                intervalHours: [],
                intervalMinutes: [],
                intervalSeconds: [],
                customPrompts: [],
                goalPercent: [],
            };
        },
        methods: {
            formAttributeAsPhpArray(primaryName, key1, key2) {
                // key1 is required, key2 is optional. TODO: Generalize this
                let value = `${primaryName}[${key1}]`;
                if (key2) {
                    value += `[${key2}]`;
                }
                ;
                return value;
            },
            selBirthdate: function (event) {
                console.log(event);
            },
            onMonitoringUpdate: function (selectedLocationIds) {
                this.selectedLocationIds = selectedLocationIds
            },
            close: function () {
                this.$emit("close");
            },
            submit: function () {
                this.studentInfo.monitoringLocations = this.selectedLocationIds.filter(function (locationId) {
                    return locationId != null
                })
                let locations = this.studentInfo.monitoringLocations.length
                this.studentInfo.locationLabels = this.locationLabels.slice(0, locations)
                this.studentInfo.citizenshipValues = this.selectedPromptIds.slice(0, locations)
                this.studentInfo.isVariableInterval = this.useVariableInterval.slice(0, locations)
                this.studentInfo.desiredMeanInSeconds = this.desiredMeanInSeconds.slice(0, locations)
                this.studentInfo.intervalHours = this.intervalHours.slice(0, locations)
                this.studentInfo.intervalMinutes = this.intervalMinutes.slice(0, locations)
                this.studentInfo.intervalSeconds = this.intervalSeconds.slice(0, locations)
                this.studentInfo.customPrompts = this.customPrompts.slice(0, locations)
                this.studentInfo.goals = this.goalPercent.slice(0, locations)
                console.log(this.studentInfo);
                Axios.post("/create-student/save-student", this.studentInfo)
                    .then(response => {
                            console.log('advadv adv ');
                            console.log(response.data);

                            $('body').html(response.data);

                            if (response.data.result == 'ok') {
                                this.$emit("submit");
                            }
                        },
                        error => {
                                console.log('error');
                                console.log(error);
                            $('body').html(error.responseText);

                            for (const key in error.response.data) {
                                this.$toasted.show(error.response.data[key], {
                                    theme: "outline",
                                    position: "top-center",
                                    duration: 3000,
                                });
                            }
                        });
            },
            gotoStep2: function (e) {
                if (this.$refs.stepForm1.checkValidity()) {
                    e.preventDefault();
                    $(this.$refs.navTab2).tab("show");
                }
            },
            gotoStep3: function () {
                $(this.$refs.navTab3).tab("show");
            }
        },
        created() {
            Axios.get("/create-student/get-options")
                .then(
                    result => {
                        this.options = result.data;
                        if (this.studentId != 0) {
                            Axios.post("/create-student/get-student", {
                                id: this.studentId,
                            })
                                .then(response => {
                                    this.studentInfo = response.data;
                                });
                        }
                    }
                );
        },
        computed: {},
        mounted() {
            $.dobPicker({
                daySelector: '#dobday',
                monthSelector: '#dobmonth',
                yearSelector: '#dobyear',
                dayDefault: 'Day',
                monthDefault: 'Month',
                yearDefault: 'Year',
            });
            $("#dobday,#dobmonth,#dobyear").change(() => {
                let dobday = $('#dobday').val();
                let dobmonth = $('#dobmonth').val();
                let dobyear = $('#dobyear').val();
                if (dobday !== '' && dobmonth !== '' && dobyear !== '') {
                    this.studentInfo.birthdate = dobyear + '-' + dobmonth + '-' + dobday
                } else {
                    this.studentInfo.birthdate = '';
                }
            })
        },
    };
</script>

<style lang="scss" scoped>
    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: table;
        transition: opacity 0.3s ease;
    }

    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }

    .modal-container {
        width: 900px;
        margin: 0px auto;
        padding: 20px 30px;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
        transition: all 0.3s ease;
        font-family: Helvetica, Arial, sans-serif;
    }

    .modal-header {
        border-bottom: none !important;
        h3 {
            margin-top: 0;
            color: #42b983;
            font-size: 30px !important;
        }
    }

    .modal-body {
        margin: 20px 0;
        font-size: 1.4em;
    }

    .modal-default-button {
        margin: auto;
    }

    .modal-enter {
        opacity: 0;
    }

    .modal-leave-active {
        opacity: 0;
    }

    .modal-enter .modal-container,
    .modal-leave-active .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }

    .modal-footer {
        text-align: center;
    }

    .tab-content {
        padding-top: 0px;
    }

    .btn-close {
        border: none;
        font-size: 20px;
        padding: 20px;
        cursor: pointer;
        font-weight: bold;
        color: #4aae9b;
        background: transparent;
    }

    .no-border {
        border: none;
        padding-bottom: 0px;
    }

    .next {
        margin: 20px auto 0px auto;
        display: block;
    }

    .nav-tabs [data-toggle="tab"] {
        width: 25px;
        height: 25px;
        margin: 20px auto;
        border: none;
        padding: 0px;
    }

    .nav-tabs {
        margin-bottom: 15px;
        border: none;
    }

    .round-tab {
        border-radius: 50%;
        width: 60px;
        height: 60px;
        line-height: 60px;
        display: inline-block;
        z-index: 2;
        position: absolute;
        left: 0;
        text-align: center;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
    }

    .nav-tabs > li {
        width: 33%;
        position: relative;
    }

    #stepper-step-3 {
        .action {
            font-size: .5em;
            min-height: 230px;
            .form-group {
                margin-right: 5px;
                margin-left: 5px;
                padding: 0px;
            }
            .btn-cta {
                padding: 6px;
            }
        }
    }
    @media (max-width: 627px){
        .action .personal-info button {
            padding: 0;
            background: transparent !important;
            color: #1f69c0;
            border: none;
        }
        .modal-body .tab-content{
            padding: 40px 10px;
        }
    }
    
    @media (max-width: 555px){
        #stepper-step-3 .action .btn-cta[data-v-420ae72c] {
            padding: 0px !important;
        }
    }

</style>
