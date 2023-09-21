<div class="row">
    <div class="col-sm-12" style="margin-bottom: 20px;background-color: #F5F5F5;padding-bottom:10px; padding-top:10px;">
        <div class="col-sm-4"> <img height="70px" style="float: left;"src="custom/themes/default/images/company_logo.png"/></div>
        <div class="col-sm-4"> <h3></h3></div>
        <div class="col-sm-4"> </div>
    </div>
</div>
{literal}
    <script>
        $(document).ready(function(){
            localStorage.clear();
            //all users
            $.ajax({
                type: "POST",
                url: "timesUsersData/getUsers.php",
                data: {},
                success: function(result){
                    localStorage.setItem('usersData', result);
                },
                error: function(result){
                    console.log('user data ajax failed');
                }
            });
            //all countries
            $.ajax({
                type: "POST",
                url: "timesUsersData/GetCountries.php",
                data: {},
                success: function(result){
                    localStorage.setItem('GetCountriesData', result);
                },
                error: function(result){

                    console.log('coutries data ajax failed');
                }
            });
            //all states
            $.ajax({
                type: "POST",
                url: "timesUsersData/GetStates.php",
                data: {},
                success: function(result){
                    localStorage.setItem('GetStatesData', result);
                },
                error: function(result){
                    console.log('coutries data ajax failed');
                }
            });
            //all cities
            $.ajax({
                type: "POST",
                url: "timesUsersData/GetCities.php",
                data: {},
                success: function(result){
                    localStorage.setItem('GetCitiesData', result);
                },
                error: function(result){
                    console.log('coutries data ajax failed');
                }
            });
            //all disciplines
            $.ajax({
                type: "POST",
                url: "timesUsersData/GetDisciplines.php",
                data: {},
                success: function(result){
                    localStorage.setItem('GetDisciplinesData', result);
                },
                error: function(result){
                    console.log('coutries data ajax failed');
                }
            });
            //all levels
            $.ajax({
                type: "POST",
                url: "timesUsersData/GetLevels.php",
                data: {},
                success: function(result){
                    localStorage.setItem('GetLevelsData', result);
                },
                error: function(result){
                    console.log('coutries data ajax failed');
                }
            });
            //All programs-cources
            // $.ajax({
            //     type: "POST",
            //     url: "timesUsersData/GetPrograms.php",
            //     data: {},
            //     success: function(result){
            //         localStorage.setItem('allPrograms', result);
            //     },
            //     error: function(result){
            //         console.log('allPrograms data ajax failed');
            //     }
            // });

            //All Institutes
            $.ajax({
                type: "POST",
                url: "timesUsersData/GetInstitutes.php",
                data: {},
                success: function(result){
                    localStorage.setItem('allInstitutes', result);
                },
                error: function(result){
                    console.log('allInstitutes data ajax failed');
                }
            });

    });
    </script>
{/literal}