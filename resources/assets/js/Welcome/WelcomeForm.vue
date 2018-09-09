<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 tos-form">
                <div class="panel panel-default form-wrapper">
                    <div id="heading-description" class="description heading">
                        i-Connect is a Self-Management Application for a smart phone or 
                        tablet. iConnect allows School-based Mentors and other individuals 
                        to set goals and monitor academic engagement and
                        social/behavioral growth of a student ages 5-25. For additional
                        information please go to iConnect.Ku.edu.
                    </div>
                    <form class="form-horizontal" action="/registration" method="GET">
                        <div class="form-group">
                            <div class="col-sm-offset-1  col-sm-10">
                                <div class="checkbox">
                                    <input type="checkbox" v-model="checkList" value="check1">
                                    <label class="description">
                                        Please acknowledge i-Connect can only be accessed with an internet
                                        connection. Before proceeding, understand your students must have access to
                                        internet for the application to operate.
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-1  col-sm-10">
                                <div class="checkbox">
                                    <input type="checkbox" data-toggle="modal" data-target="#myModal" v-model="checkList" value="check2">
                                    <label class="description">
                                        Please read and accept the <a href="" onclick="window.open('/tos');">Terms and Conditions</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class="btn btn-default btn-cta" @click="submit($event)">Submit
                                </button>
                            </div>
                        </div>
                        <!-- Button trigger modal -->

                    </form>
                    <!-- Modal -->
                    <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog full-width-model">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-center" id="myModalLabel">User Agreement</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row tos">
                                        <h3 id="introduction"></h3>
                                        <p>
                                            This document describes the conditions of use and limitations of the iConnect Website. The website is a tool for educators,
                                            parents, and program providers interested in monitoring the academic growth and social-behavioral development of individuals and students,
                                            ages 5-25 years old. This is an agreement between the University of Kansas(the University), the faculty and staff who have designed and developed
                                            the site and its content(the Developers), and persons entering, managing, and receiving progress reports from the I CONNECT website(the Users).
                                            The agreement covers a range of issues as follows
                                        </p>

                                        <h3 id="purpose">Purpose</h3>
                                        <p>
                                            The iConnect website is a central source for mobile support customization, for iConnect, a self-monitoring and mentoring intervention. The website
                                            provides data services to enter, report, and interpret the results of the students' mobile application self-monitoring input data. The website maintains
                                            management the support for the private use of its data services by individuals and indvidual school districts. For example, these tools enable a Principal of a school
                                            to review input data from mentors and students at the school and to enroll their own staff as iConnect Mentors. The management tool enables Facilitators(district personnel),
                                            Site Facilitators(school administrators) and Mentors the ability to monitor and edit/revise a students's/individual's self-monitoring goal.
                                            <br>
                                            <br>
                                            The Developers intend the site's resources and tools to be used to plan, train, implement, and manage continuous progress monitoring and decision making about the effectiveness
                                            of intervention services provided for individuals using the I Connect mobile application for self-monitoring. The goal is to improve the academic on-task behavior of students
                                            as well as increasing the productivity and positive social skills of individual users
                                            <br>
                                            <br>
                                            The use of the iConnect website's informations is free and the online management and data services is at this time also free, unless waived by the Developers in lieu of other
                                            sources of support(i.e., a grant, partnership, or contract). The University reserves the right to change pricing at any time after advance notice.
                                        </p>

                                        <h3 id="copyright">Copyright and Authorization</h3>
                                        <p>
                                            All pages, material, artwork, photos, video clips, protocols, and content accessible in the website are the property of the University of Kansas, unless otherwise noted.
                                            The University grants to Users a limited, non-exclusive, non-transferable, and revocable authorization to access, print, and use said materials for the limted purpose of assessing
                                            growth and development., describing early chiildhood interventions, and/or conducting educational or developmental research. This authorization assumes the User will not sell or
                                            otherwise profit from distribution of these materials and will credit the Developers and the University for all dissemination incoporating these materials.
                                        </p>

                                        <h3 id="Ownership">Ownership</h3>
                                        <p>
                                            All materials are copyrighted. However, data entered into the iConnect website by Users (including information on Users, Students/Individual Information), and information
                                            resulting from other assessments used by the User) are not owned by the University.
                                        </p>

                                        <h3 id="cosent">Consent to Enter Child Data</h3>
                                        <p>
                                            It is the User's responsibility to obtain any and all permissions and consents for the entry of information to the iConnect website and that permit use of that information in
                                            accordance with the terms and conditions of this User Agreement.
                                        </p>

                                        <h3 id="privacy">Priacy, Security, and Confidentiality</h3>
                                        <p>
                                            All data entered by the User are maintained on secure servers at the University of Kansas. Access to all User and Student/Individual information and data will be password
                                            protected and restricted to only those individuals with login access, which is controlled by the User. No data will be released without the expressed request and/or permission of the
                                            User, except as required by law.
                                        </p>

                                        <h3 id="secondary_data_use">Secondary Uses of Data</h3>
                                        <p>
                                            Users grant permissions to the Developers or their designees secondary use of their information. These secondary uses are restricted to activities to improve the website's
                                            information, resources, and services or conduct of research by the developers, as reviewd and approved by appropriate Institutional Review Board(s). User and Student/Individual
                                            Information, for these secondary purposes will be available only to the Developers or approved researchers, and no further distribution of these data is permitted. All secondary use of
                                            data will be kept private, and no individual will be identifiable in any report or professinal publication resulting from these secondary uses. Whenever possible, secondary uses will
                                            not include information that enables individual identification.
                                        </p>

                                        <h3 id="liability">Limits of Liability</h3>
                                        <p>
                                            The University and Develoeprs assume responsibility for maintaining the iConnect website and the integrity of User and Information and Students/Individual Data. The User is fully
                                            responsible for collecting Student and Individual User Data, maintaining appropriate restrictions for accessing data, and interpreting student's and individual's, program's, and intervention's
                                            (developmental, educational, &amp; social/behavioral) progress on the basiss of these data. The Users assume all liablity for decisions amde using the data entered into or reported
                                            from the iConnect website, and the University and Developers have no liability.
                                        </p>

                                        <h3 id="termination">Termination of Relationship and Disposition of Data</h3>
                                        <p>
                                            Access to the iConenct Website may be terminated by the University, the Develoeprs, or the Users without cause but with prior notice, Users or Developers can modify Data Owner and
                                            User access to maintain protection and appropriate oversight of User and Student/Individual Information and Data.
                                            At time of termination, User and Student/Individual Information, and Data will be retained in the central database for a period of at least one year, unless otherwise indicated, nonidentifiable
                                            Profile and Student/Individual Data will be retaied after that time for secondary use purposes only.
                                        </p>

                                        <h3 id="support">Support</h3>
                                        <p>
                                            The University will maintain online and limited telephone support for Users and Data Owners to the extent that funds remain available. The University and Developers will
                                            notify all Users and data Owners with information on any changes in this policy and appropriate notice prior to terminating service.
                                        </p>
                                        <br>
                                        <h4>Rev. 5/7/2018</h4>
                                        <br>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Accpet</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        data: function () {
            return {
                checkList: []
            };
        },
        methods: {
            submit: function (e) {
                if (this.checkList.length < 2) {

                    let check1 = true, check2 = true;

                    this.checkList.forEach(element => {
                        switch (element) {
                            case 'check1':
                                check1 = false;
                                break;
                            case 'check2':
                                check2 = false;
                                break;
                        }
                    });

                    if (check1) {
                        toastr["error"]("Please acknowledge i-Connect can only be accessed with an internet connection.", "Error!");
                    } else if (check2) {
                        toastr["error"]("Please read and accept the Terms and Conditions", "Error!");
                    }

                    e.preventDefault();
                } else {
                }
            }
        }
    };
</script>

<style>
    .tos {
        padding: 20px !important;
    }
</style>