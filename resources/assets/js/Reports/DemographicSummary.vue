<template>
    <div class="container gray-border">
        <h1 class="text-center">Student Demographic Summary</h1>
        <div class="row list-wrapper">
            <div class="col-md-3 list-option" v-if="this.role == 2">
                <h3 class="text-center">School Level</h3>
                <select name="school level" @change="getFilterSchools" id="school_level" v-model="filter.level" class="form-control">
                    <option v-for="level in levels" :value="level.id" :key="level.id">{{level.name}}</option>
                    <option value="0">School Level(No Selected)</option>
                </select>
            </div>
            <div class="col-md-3 list-option" v-if="this.role == 2">
                <h3 class="text-center">School Name</h3>
                <select name="school name" id="school_name" class="form-control" v-model="filter.schoolId">
                    <option v-for="school in schools" :value="school.id" :key="school.id">{{school.name}}</option>
                    <option value="0">School Name(No Selected)</option>
                </select>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 list-option">
                <h3 class="text-center">Report Options</h3>
                <div class="gray-border">
                    <div class="checkbox">
                        <label><input type="checkbox" value="fullname" v-model="filter.selectedReportOptions">Student Full Name</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="iep" v-model="filter.selectedReportOptions">IEP</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="ethnicity" v-model="filter.selectedReportOptions">Ethnicity</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="age" v-model="filter.selectedReportOptions">Age</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="gender" v-model="filter.selectedReportOptions">Gender</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="bdate" v-model="filter.selectedReportOptions">Birth Dates</label>
                    </div>
                </div>
            </div>
            <div class="col-md-6 list-option" v-if="this.role == 3">
                <h3 class="text-center">Select Date or Date Range</h3>
                <div class="text-center">
                    <date-picker v-model="time3" range :shortcuts="shortcuts" :lang="lang"></date-picker>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 list-option">
                <h3 class="text-center">Export Format</h3>
                <div class="gray-border">
                    <div class="radio">
                        <label><input type="radio" value="word" v-model="filter.exportFormat" >Word</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" value="csv" v-model="filter.exportFormat" >CSV</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" value="excel" v-model="filter.exportFormat" >Excel</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" value="pdf" v-model="filter.exportFormat" >PDF</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row list-wrapper" v-if="this.role == 2">
            <h3>Select Date or Date Range</h3>
            <date-picker v-model="time3" range :shortcuts="shortcuts" :lang="lang"></date-picker>
        </div>
        <hr>
        <div class="row list-wrapper">
            <ul class="btn_area">
                <li class="list-option">
                    <button class="btn btn-cta btn-large reselect" @click="clearFilter">Re-select</button>
                </li>
                <li class="list-option">
                    <button class="btn btn-cta btn-large btn-blue preview action" @click="filterValidation">Preview Report</button>
                </li>
                <li class="list-option">
                    <button class="btn btn-cta btn-large btn-red print action" @click="filterValidation">Print</button>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>

import Axios from "axios";
import DatePicker from 'vue2-datepicker';

export default {
    components: {
        DatePicker
    },

    props: [
        'role'
    ],

    data () {
        return {
            levels: [],
            schools: [],
            mentors: [],
            students: [],
            filter: {
                level: 0,
                schoolId: 0,
                mentorId: 0,
                selectedMentors: [],
                selectedStudents: [],
                selectedReportOptions: [],
                exportFormat: '',
                searchKeyword: "",

                page: 1,
                rowCount: 4,
            },
            time3: '',
            shortcuts: [
                {
                    text: 'Today',
                    onClick: () => {
                        this.time3 = [ new Date(), new Date() ]
                    }
                }
            ],
            lang: {
                days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                months: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                pickers: ['next 7 days', 'next 30 days', 'previous 7 days', 'previous 30 days'],
                placeholder: {
                date: 'Select Date',
                dateRange: 'Select Date Range'
                }
            },
        }
    },

    created() {
        if (this.role == 2) {
            this.getFilterLevels();
        } else {
            this.getFilterMentors();
        }
    },

    methods: {
        getFilterLevels: function() {
            Axios.get('/my-students/get-filter-levels').then(response => {
                this.levels = response.data;
                this.filter.level = 0;
                this.filter.schoolId = 0;
                this.filter.mentorId = 0;
            });
        },

        getFilterSchools: function() {
            this.filter.schoolId = 0;
            if(this.filter.level == 0){
                return;
            }
            Axios.post('/my-students/get-filter-schools', this.filter).then(response => {
                this.schools = response.data;
            });
        },
        getFilterMentors: function() {
            this.filter.selectedMentors = [];
            this.mentors = [];
            if(this.filter.schoolId == 0 && this.role == 2) return;
            Axios.post('/my-students/get-filter-mentors', this.filter).then(response => {
                this.mentors = response.data;
            });
        },
        getFilterStudents: function() {
            this.filter.selectedStudents = [];
            this.students = [];
            if(this.filter.selectedMentors === undefined || this.filter.selectedMentors.length == 0) return;

            Axios.post('/my-students/get-filter-students', this.filter).then(response => {
                this.students = response.data;
            });
        },
        filterValidation: function() {
            if (this.role == 2) {
                if(this.filter.level == 0)
                    toastr["error"]("Please select school level!", "Error!");

                if(this.filter.schoolId == 0)
                    toastr["error"]("Please select a school name!", "Error!");
            }
            if(this.filter.selectedReportOptions === undefined || this.filter.selectedReportOptions.length == 0)
                toastr["error"]("Please select a Report Option!", "Error!");

            if(this.filter.exportFormat == 0)
                toastr["error"]("Please select the Export Format!", "Error!");

            else
                toastr["success"]("Preview Coming Soon!", "Success!");
        },
        clearFilter() {
            if(this.role == 2) {
                this.schools = [];
                this.mentors = [];
            }
            this.students = [];
            this.filter = {
                level: 0,
                schoolId: 0,
                mentorId: 0,
                selectedMentors: [],
                selectedStudents: [],
                selectedReportOptions: [],
                exportFormat: '',
            }
        },
    }
}
</script>

<style lang="scss">
    .homeheading {
        margin-bottom: 20px;
    }
</style>

<style lang="scss" scoped>
    .report-title {
        margin-bottom: 40px;
    }

    select {
        height: 35px;
        line-height: 35px;
        font-size: 18px;
        border-radius: 0px;
        outline: 1px inset black;
        outline-offset: -1px;
    }

    .list-wrapper {
        margin: 20px;
        h3 {
            font-size: 1.4em;
            font-weight: 600;
        }

        .list-option {
            padding: 0px 10px;

            h3 {
                font-size: 1.4em;
                font-weight: 600;
            }
            .gray-border {
                height: 200px;
                padding: 0px 10px;
            }

            button {
                display: block;
            }

            .reselect {
                margin: 20px 0px;
            }

            .preview {
                margin: 20px auto;
                padding: 5px 20px;
            }

            .print {
                margin: 20px auto;
                padding: 5px 70px;
            }
        }
    }
    .btn_area li{
        list-style: none;
        display: inline-block;
    }
</style>


