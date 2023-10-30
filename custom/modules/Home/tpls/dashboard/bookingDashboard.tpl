<!-- Custom Donut -->
<div>
    <div style="border-bottom: 5px solid red;"></div>
    <h2 style="text-align:center;" id="chart_name"></h2>

    <div class="row col-sm-10">
        <div class="col-sm-3">
            <div class="form-group">
                <label for="from_date">From Date:</label>
                <input type='date' class="form-control hover" id="from_date" placeholder="From Date"></input>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="to_date">To Date:</label>
                <input type='date' class="form-control hover" id="to_date" placeholder="To Date"></input>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="customer_name">Customer Name:</label>
                <select id="customer_name" name="customer_name" required>
                    <option>-- Select Agent Name --</option>
                </select>
            </div>
        </div>
        <button id="submitdashDoghnut" type="button" onclick="doghnutApp();" class="btn btn-primary"
            style="background-color:#e8c423; margin-top: 19px;">Submit</button>
    </div>
    <div id="chart">
        <!-- <canvas id="myChart"></canvas> -->

    </div>
</div><br><br><br>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    {literal}
        <style type="text/css">
            .no-js #loader {
                display: none;
            }

            .js #loader {
                display: block;
                position: absolute;
                left: 100px;
                top: 0;
            }

            .se-pre-con {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background: url('custom/themes/default/images/Preloader.gif') center no-repeat #fff;
            }
            .pagingWrapper {
            display: table;
            margin: 0 auto;
            }
            ul#horizontal-list {
                /*min-width: 696px;*/
                list-style: none;
                padding-top: 20px;
            }
            ul#horizontal-list li {
                display: inline;
            }
        </style>
        <script src="custom/include/UI/app-js/cdn/js/jquery.min.js"></script>
        <script src="custom/include/UI/app-js/cdn/js/modernizr.js"></script>
        <script src="custom/modules/Home/SourceFiles/Thirdparty/js/Dashboard.js"></script>
        <link rel="stylesheet" type="text/css" href="custom/modules/Home/app-assets/vendors/css/forms/selects/select2.css">
        <script src="custom/modules/Home/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    {/literal}
</head>
<body>
    <div class="se-pre-con"></div>
</body>

</html>
{literal}
    <script type="text/javascript">
        // Wait for window load
        $(window).load(function() {
            // Animate loader off screen
            sleep(1000);
            $(".se-pre-con").fadeOut("slow");
        });

        function sleep(milliseconds) {
            const date = Date.now();
            let currentDate = null;
            do {
                currentDate = Date.now();
            } while (currentDate - date < milliseconds);
        }
    </script>
{/literal}
<!-- Loader End -->
<head>
    <!-- JS, Popper.js, and jQuery -->
    {literal}<script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
        </script>
        <script src="custom/include/UI/app-js/getCountriesByHtml.js"></script>
        <script src="custom/include/UI/app-js/cdn/js/sweetalert2.all.min.js"></script>

        <!-- FontAwesome-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
            integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="custom/include/UI/app-assets/css/dashStyle.css">
        <link rel="stylesheet" type="text/css" href="custom/include/UI/app-assets/vendors/css/extensions/sweetalert.css">
        <script src="custom/include/UI/app-assets/vendors/js/extensions/sweetalert.min.js"></script>

        <style>
            .alertHead {
                padding: 5px 10px;
            }

            .cardWrap {
                padding: 10px 20px;
            }

            .alertCard {
                margin: 8px 0px;
            }

            .alertCard p:nth-child(2) {
                line-height: 40px
            }

            @media (max-width: 768px) {

                .alertHead {
                    width: 100%;
                    padding: 5px;
                    display: block;
                    border-bottom: 1px solid #ccc;
                }

                .div1 {
                    width: 100% !important;
                    font-weight: 600;
                    font-size: 22px;
                }

                .div2 {
                    width: 100%;
                    margin-top: 5px;
                }

                .alertHead .div2 ul {
                    display: flex;
                    float: none !important;
                }

                .alertHead .div2 ul li {
                    list-style: none;
                    margin-right: 5px;
                    font-size: 14px;

                }
            }

            .tabBtn button {
                padding: 5px 10px;
                border-radius: 3px;
                background: transparent;
                border: none;
                transition: .3s;
                border-right: 1px solid #999;
                border-left: 1px solid #999;
                outline: none;
                font-weight: 600;
                font-size: 18px;
                margin-top:10px;
            }

            .tabBtn button:hover {
                background: orange;
            }

            #dashboard_popup_view_list a:link {
                color: #e56455;
            }

            #dashboard_popup_view_list a:hover {
                color: #A34D11;
            }

            span.select2-container {
                z-index: 0 !important;
            }

            hr.linebreak {
                border-top: 1px dashed gray;
            }
        </style>
        <script>
            $(document).ready(function() {});
        </script>
    {/literal}

    <title></title>
</head>
<body background="blue">

    <div class="container-fluid mt-3">
        <div class="row pl-2 pr-2">
            {* <div class="col-md-12">
                <div class="tabBtn">
                    <button name="year_all" id="year_all">All</button>
                    <button name="year_2022" id="year_2022">2022</button>
                    <button name="year_2023" id="year_2023">2023</button>
                </div>
            </div> *}
            <div class="alertWrap">
                <!-- Listings 2022 -->
                <div class="alertCover" id="All">
                    <div class="alertHead" id="alertTrigger">
                        <div class="div1"><span class="alert-title"><strong>Bookings</strong></span></div>
                    </div>
                    <div class="cardWrap col-12" style="transition: .4s linear; overflow: hidden;" id="alertClose">
        
                        <!--------------------------------------------------------------------------------->
                        <!--Graph panel to display a bar char showing Assigned Leads Vs Converted Leads  -->
                        <!--------------------------------------------------------------------------------->
                        <div class="col-md-6" style="margin-left:0px; margin-right:0px;">
                            <div class="card" style="width:100%">
                                <div class="card-header">
                                    All Bookings ({$TOTALBOOKINGCOUNT})
                                </div>
                                <div class="card-body" style="height:176px;">
                                    <script>allBookingsGraphData= {$ALLBOOKINGSGRAPHARR};</script>
                                    <canvas id="allBookingsChartCanvas" style="margin: auto;"> </canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-left:0px; margin-right:0px;">
                            <div class="card" style="width:100%">
                                <div class="card-header">
                                    Payments ({$ALLPAYMENTCOUNT} $)
                                </div>
                                <div class="card-body" style="height:176px;">
                                    <script>allPaymentsGraphData= {$ALLPAYMENTSGRAPHARR};</script>
                                    <canvas id="allPaymentsChartCanvas" style="margin: auto;"> </canvas>
                                </div>
                            </div>
                        </div>
                        {* <div class="col-md-3" style="margin-left:0px; margin-right:0px;">
                            <div class="card" style="width:100%">
                                <div class="card-header">
                                    Listings Created Vs Live (6 Months)
                                </div>
                                <div class="card-body">
                                    <script>listingsLiveMonthlyGraphData= {$ALLLISTINGSLIVEMONTHLYGRAPHARR};</script>
                                    <canvas id="listingsAssignedVsConvertedChartCanvas" style="padding: 0;margin: auto;"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5" style="margin-left:0px; margin-right:0px;">
                            <div class="card" style="width:100%">
                                <div class="card-header">
                                   Secondary Listings Agent Wise
                                </div>
                                <div class="card-body">
                                    <script>agentsSecondaryListings= {$AGENTSSECONDARYLISTINGSGRAPHARR};</script>
                                    <canvas id="agentsSecondaryListingsBarChartCanvas" style="padding: 0;margin: auto;"></canvas>
                                </div>
                            </div>
                        </div> *}
                    </div>
                    <div class="cardWrap col-12" style="transition: .4s linear; overflow: hidden;" id="alertClose">
                        <div class="col-md-6" style="margin-left:0px; margin-right:0px;">
                            <div class="card" style="width:100%">
                                <div class="card-header">
                                   Most Paid By Customers
                                </div>
                                <div class="card-body">
                                    <script>allPaymentsByCustomerGraphData= {$ALLPAYMENTSBYCUSTOMERGRAPHARRJSON};</script>
                                    <canvas id="allPaymentsByCustomerChartCanvas" style="padding: 0;margin: auto;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- dataPopup Modal -->
    <div class="modal fade" id="dataPopupModal" role="dialog" aria-labelledby="dataPopupModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="padding: 3%;">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#283349;style='height:fit-content'">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabelHistory" style="color:#fff;margin:auto">View</h4>
                    <h3 id='count' style='color:white;font-size:18px'></h3>
                    <div style='text-align:right;width:100%;margin-top:-3%'>;
                        <button class='btn btn_primary' style="background-color: white;color:#283349" type='button'
                            id='previous'>Previous</button>
                        <button class='btn btn-primary' style="background-color: white;color:#283349" type="button"
                            id="load_data">next</button>
                    </div>
                </div>
                <div class="modal-body" id="dataPopupModalBody" style="max-height: 80vh;overflow: auto;">

                </div>
            </div>
        </div>
    </div>

    {literal}
    <script>
        let tab = 'listings';
        $(document).ready(function() {
            document.getElementsByClassName('sidebar')[0].style.display = 'none';
            Dashboard.allBookingsGraphData();
            Dashboard.allPaymentsGraphData();
            Dashboard.allPaymentsByCustomerGraphData();
            Dashboard.customerName();
            //$('#customer_name').select2();
            //Dashboard.agentsOffPlanListingsBarChart();
            //Dashboard.agentsRentListingsBarChart();
            //Dashboard.agentsSecondaryListingsBarChart();
            //Dashboard.allListingsGraphData2022();
            //Dashboard.allLiveListingsGraphData2022();
            //Dashboard.listingsLiveMonthlyGraphData2022();
            //Dashboard.agentsOffPlanListingsBarChart2022();
            //Dashboard.agentsRentListingsBarChart2022();
            //Dashboard.agentsSecondaryListingsBarChart2022();
            //Dashboard.allListingsGraphData2023();
            //Dashboard.allLiveListingsGraphData2023();
            //Dashboard.listingsLiveMonthlyGraphData2023();
            //Dashboard.agentsOffPlanListingsBarChart2023();
            //Dashboard.agentsRentListingsBarChart2023();
            //Dashboard.agentsSecondaryListingsBarChart2023();
            //$("#drop_down").click(function() {
            //    $("#alertClose").toggleClass("fetch");
            //});
            //$("#refresh_dashboard").click(function() {
            //    window.location.reload();
            //});
            //doghnutApp();
        });
        $('#2022,#2023').slideUp();
        $('#year_all').css({"background":"#283349", "color":"white", "box-shadow":"inset 0px 1px 5px white"});

        $("#year_all").click(function() {
            //tab = 'leads';
            $("#All").slideDown(200);
            $('#2022,#2023').slideUp(
                200);
            $(this).css({"background":"#283349", "color":"white", "box-shadow":"inset 0px 1px 5px white"});
            $('#year_2022,#year_2023').css({"background":"", "color":"#000", "box-shadow":""});
            //doghnutApp();
        });

        $("#year_2022").click(function() {
            //tab = 'leads';
            $("#2022").slideDown(200);
            $('#All,#2023').slideUp(
                200);
            $(this).css({"background":"#283349", "color":"white", "box-shadow":"inset 0px 1px 5px white"});
            $('#year_2023,#year_all').css({"background":"", "color":"#000", "box-shadow":""});
            //doghnutApp();
        });

        $("#year_2023").click(function() {
            //tab = 'contacts';
            $("#2023").slideDown(200);
            $('#All,#2022').slideUp(200);
            $(this).css({"background":"#283349", "color":"white", "box-shadow":"inset 0px 1px 5px white"});
            $('#year_all,#year_2022').css({"background":"", "color":"#000", "box-shadow":""});
            //doghnutApp();
        });

        let current_display_number = 150;
        $('#load_data').click(function(e) {
            //start count total number of records
            let i = 0;
            while (document.getElementById(i)) {
                i++;
            }
            if (current_display_number > 150) {
                document.getElementById('previous').disabled = false;
            }
            //end count total number of records
            //check if total record is less than 150
            if (i < 150) {
                //disable both button if records less than  150
                document.getElementById('previous').disabled = true;
                document.getElementById('load_data').disabled = true;
            } else {
                //if current display number is greater than total record than disable next button
                if (current_display_number > i) {
                    //disable next button
                    document.getElementById('load_data').disabled = true;
                    //display record till  last record
                    for (let k = previous_display_number; k < i; k++) {
                        document.getElementById(k).hidden = false;
                    }
                    //hide previously displayed records
                    for (let x = 0; x <= previous_display_number; x++) {
                        document.getElementById(x).hidden = true;
                    }
                    //display current records numbers being displayed
                    document.getElementById('count').innerHTML = previous_display_number + '-' + i + ' of ( ' +
                        i + ' )';
                } else {
                    //if current display is not greater than total record
                    //enable both buttons(previous and next)
                    document.getElementById('previous').disabled = false;
                    document.getElementById('load_data').disabled = false;
                    //put current_display_number value into previous
                    previous_display_number = current_display_number;
                    //increment of 150 if current display number is smaller than total record else disable button
                    if (current_display_number < i) {
                        current_display_number = current_display_number + 150;
                    } else if (current_display_number > i) {
                        document.getElementById('load_data').disabled = true;
                    }
                    //if current_display_number greater than i than display till total records(i)
                    if (current_display_number > i) {
                        for (let k = previous_display_number; k < i; k++) {
                            document.getElementById(k).hidden = false;
                        }
                        for (let x = 0; x <= previous_display_number; x++) {
                            document.getElementById(x).hidden = true;
                        }
                        document.getElementById('count').innerHTML = previous_display_number + '-' + i +
                            ' of ( ' + i + ' )';
                    } else {
                        //else if current_display_number smaller than total record(i) than display till current_display_number
                        for (let k = previous_display_number; k <= current_display_number; k++) {
                            document.getElementById(k).hidden = false;
                        }
                        for (let x = 0; x < previous_display_number; x++) {
                            document.getElementById(x).hidden = true;
                        }
                        document.getElementById('count').innerHTML = previous_display_number + '-' +
                            current_display_number + ' of ( ' + i + ' )';
                    }
                }
            }
        });
        //end
        // decrease data counter and previous button start
        $('#previous').click(function(e) {
            //disable next button on click 
            document.getElementById('load_data').disabled = false;
            //count total number of records being displayed(i)
            let i = 0;
            while (document.getElementById(i)) {
                i++;
            }
            //if current_display_number is smaller than equal to 150 disable previous button
            if (current_display_number <= 150) {
                document.getElementById('previous').disabled = true;
            } else {
                //put current_display_number in previous_display_number
                previous_display_number = current_display_number;
                //decrease 150 from current_display_number
                if (current_display_number > 150) {
                    current_display_number = current_display_number - 150;
                }
                //display till current_display_number
                for (let k = current_display_number - 150; k < current_display_number; k++) {
                    document.getElementById(k).hidden = false;
                }
                for (let x = current_display_number; x < previous_display_number; x++) {
                    document.getElementById(x).hidden = true;
                }
                //displaying number of records
                document.getElementById('count').innerHTML = current_display_number - 150 + '-' +
                    current_display_number + ' of ( ' + i + ' )';
            }
        });

        function dataPopup(id) {
            // set current_display_number to 150 if any modal opens
            current_display_number = 150;
            //enable both buttons
            document.getElementById('load_data').disabled = false;
            document.getElementById('previous').disabled = false;
            //display number of records  currently being displayed to 0- 150
            var viewHTML = '';
            $.ajax({
                type: "POST",
                url: "index.php?module=Home&action=getDataPopup&sugar_body_only=true",
                data: {'id':id},
                async: false,
                success: function(result) {

                    if ($("#dataPopupModalBody").children().length > 0) {
                        // it already exists
                        $("#dataPopupModalBody").empty();
                    }
                    var obj = JSON.parse(result);
                    for (key = 0; key < obj.length; key++) {
                        //if key is greater than 150 then hide the div
                        if (key > 150) {
                            viewHTML += '<div id=' + key + ' hidden><div id="' + obj[key].id + '" title="' +
                                obj[key].name +
                                '" style="margin-bottom: 10px; border: 1px solid #ccc; padding: 10px; border-radius: 4px; box-shadow: 0px 2px 10px #999;"><h2 id="dashboard_popup_view_list"><a href="index.php?module=' +
                                obj[key].module + '&action=DetailView&record=' + obj[key].id +
                                '" target="_blank" style="cursor: pointer !important;">' + obj[key].name +
                                '</a><span style="float:right; font-size:15px; margin-top:5%;">' + obj[key]
                                .date_entered + '</span></h2></div></div>';
                        } else {
                            //show divs
                            viewHTML += '<div id=' + key + '><div id="' + obj[key].id + '" title="' + obj[
                                    key].name +
                                '" style="margin-bottom: 10px; border: 1px solid #ccc; padding: 10px; border-radius: 4px; box-shadow: 0px 2px 10px #999;"><h2 id="dashboard_popup_view_list"><a href="index.php?module=' +
                                obj[key].module + '&action=DetailView&record=' + obj[key].id +
                                '" target="_blank" style="cursor: pointer !important;">' + obj[key].name +
                                '</a><span style="float:right; font-size:15px; margin-top:5%;">' + obj[key]
                                .date_entered + '</span></h2></div></div>';
                        }
                    }
                    $("#dataPopupModalBody").html(viewHTML);
                },
                error: function(result) {
                    console.log('user data ajax failed');
                }
            });
            //count total records
            let z = 0;
            while (document.getElementById(z)) {
                z++;
            }
            document.getElementById('previous').disabled = true;
            document.getElementById('count').innerHTML = '0-' + current_display_number + ' of ( ' + z + ' )';

            //disable both  buttons if load_data is disabled and previous button and display number to 0-z
            if (z < 150) {
                document.getElementById('count').innerHTML = '0-' + z + ' of ( ' + z + ' )';
                document.getElementById('load_data').disabled = true;
                document.getElementById('previous').disabled = true;
            }
        }

        function doghnutApp() {
            let color=[];
            let cards=[];
            let cardsname=[];
            card1 = 0;
            card2 = 0;
            card3 = 0;

            card1name = 0;
            card2name = 0;
            card3name = 0;

            var fromDate = document.getElementById("from_date").value;
            var toDate = document.getElementById("to_date").value;
            var customer_name = document.getElementById("customer_name").value;
            if(fromDate=='' && toDate !=''){
                document.getElementById('from_date').style.backgroundColor='red';
                return;
            }
            $( "#from_date" ).click(function() {
                document.getElementById('from_date').style.backgroundColor='#D8F5EE';
            });
            
            $.ajax({
                type: "POST",
                url: "index.php?module=Home&action=getDoghnutAppData&sugar_body_only=true",
                data: {'fromDate':fromDate,'toDate':toDate,'customer_name':customer_name},
                async: false,
                success: function(result) {
                    var obj = JSON.parse(result);
                    //data
                    card1 = obj['0'].card1;
                    card2 = obj['0'].card2;
                    card3 = obj['0'].card3;
                    card4 = obj['0'].card4;
                    //labels
                    card1name = obj['0'].card1name;
                    card2name = obj['0'].card2name;
                    card3name = obj['0'].card3name;
                    card4name = obj['0'].card4name;
                },
                error: function(result) {
                    console.log('user data ajax failed');
                }
            });

            //Doghnut Chart
            Chart.defaults.doughnutLabels = Chart.helpers.clone(Chart.defaults.doughnut);

            var helpers = Chart.helpers;
            var defaults = Chart.defaults;

            Chart.controllers.doughnutLabels = Chart.controllers.doughnut.extend({
                updateElement: function(arc, index, reset) {
                    var _this = this;
                    var chart = _this.chart,
                        chartArea = chart.chartArea,
                        opts = chart.options,
                        animationOpts = opts.animation,
                        arcOpts = opts.elements.arc,
                        centerX = (chartArea.left + chartArea.right) / 2,
                        centerY = (chartArea.top + chartArea.bottom) / 2,
                        startAngle = opts.rotation, // non reset case handled later
                        endAngle = opts.rotation, // non reset case handled later
                        dataset = _this.getDataset(),
                        circumference = reset && animationOpts.animateRotate ? 0 : arc.hidden ? 0 : _this
                        .calculateCircumference(dataset.data[index]) * (opts.circumference / (2.0 * Math
                            .PI)),
                        innerRadius = reset && animationOpts.animateScale ? 0 : _this.innerRadius,
                        outerRadius = reset && animationOpts.animateScale ? 0 : _this.outerRadius,
                        custom = arc.custom || {},
                        valueAtIndexOrDefault = helpers.getValueAtIndexOrDefault;

                    helpers.extend(arc, {
                        // Utility
                        _datasetIndex: _this.index,
                        _index: index,

                        // Desired view properties
                        _model: {
                            x: centerX + chart.offsetX,
                            y: centerY + chart.offsetY,
                            startAngle: startAngle,
                            endAngle: endAngle,
                            circumference: circumference,
                            outerRadius: outerRadius,
                            innerRadius: innerRadius,
                            label: valueAtIndexOrDefault(dataset.label, index, chart.data.labels[
                                index])
                        },

                        draw: function() {
                            var ctx = this._chart.ctx,
                                vm = this._view,
                                sA = vm.startAngle,
                                eA = vm.endAngle,
                                opts = this._chart.config.options;

                            var labelPos = this.tooltipPosition();
                            var segmentLabel = vm.circumference / opts.circumference * 100;

                            ctx.beginPath();

                            ctx.arc(vm.x, vm.y, vm.outerRadius, sA, eA);
                            ctx.arc(vm.x, vm.y, vm.innerRadius, eA, sA, true);

                            ctx.closePath();
                            ctx.strokeStyle = vm.borderColor;
                            ctx.lineWidth = vm.borderWidth;

                            ctx.fillStyle = vm.backgroundColor;

                            ctx.fill();
                            ctx.lineJoin = 'bevel';

                            if (vm.borderWidth) {
                                ctx.stroke();
                            }

                            if (vm.circumference >
                                0.15) { // Trying to hide label when it doesn't fit in segment
                                ctx.beginPath();
                                ctx.font = helpers.fontString(opts.defaultFontSize, opts
                                    .defaultFontStyle, opts.defaultFontFamily);
                                ctx.fillStyle = "#fff";
                                ctx.textBaseline = "top";
                                ctx.textAlign = "center";

                                // Round percentage in a way that it always adds up to 100%
                                ctx.fillText(segmentLabel.toFixed(0) + "%", labelPos.x, labelPos
                                    .y);
                            }
                        }
                    });

                    var model = arc._model;
                    model.backgroundColor = custom.backgroundColor ? custom.backgroundColor :
                        valueAtIndexOrDefault(dataset.backgroundColor, index, arcOpts.backgroundColor);
                    model.hoverBackgroundColor = custom.hoverBackgroundColor ? custom.hoverBackgroundColor :
                        valueAtIndexOrDefault(dataset.hoverBackgroundColor, index, arcOpts
                            .hoverBackgroundColor);
                    model.borderWidth = custom.borderWidth ? custom.borderWidth : valueAtIndexOrDefault(
                        dataset.borderWidth, index, arcOpts.borderWidth);
                    model.borderColor = custom.borderColor ? custom.borderColor : valueAtIndexOrDefault(
                        dataset.borderColor, index, arcOpts.borderColor);

                    // Set correct angles if not resetting
                    if (!reset || !animationOpts.animateRotate) {
                        if (index === 0) {
                            model.startAngle = opts.rotation;
                        } else {
                            model.startAngle = _this.getMeta().data[index - 1]._model.endAngle;
                        }
                        
                        model.endAngle = model.startAngle + model.circumference;
                    }
                    
                    arc.pivot();
                }
            });

            if (card1 != '') {
                color[1]="#099070";
            }
            if(card2 != '') {
                color[2]="#F88F79";
            }
            if(card3 != '') {
                color[3]="#6B898B";
            }
            if(card4 != '') {
                color[4]="#FFFF00";
            }
           
            var config = {
                type: 'doughnutLabels',
                data: {
                    datasets: [{
                        data: [
                            card1,
                            card2,
                            card3,
                            card4,
                        ],
                        backgroundColor: [
                            color[1],
                            color[2],
                            color[3],
                            color[4],
                        ],
                        label: 'Dataset 1'
                    }],
                    labels: [
                        card1name,
                        card2name,
                        card3name,
                        card4name,
                    ]
                },
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: ''
                    },
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    },
                }
            };
            document.getElementById('chart').innerHTML='';
            const canvas = document.createElement("canvas");
            canvas.id='myChart';
            document.getElementById('chart').appendChild(canvas);
            var ctx = document.getElementById("myChart").getContext("2d");
            new Chart(ctx, config);
        }
    </script>
    {/literal}
</body>

{* {literal}
<script type="text/javascript">
    $(document).ready(function () {
        //Dashboard.tasksGraph();
        //Dashboard.leadsAssignedVsConvertedChart();
        //Dashboard.activitiesGraphData();
        Dashboard.allLeadsGraphData();
    });
</script>
{/literal} *}