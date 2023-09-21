var Dashboard = {
    allBookingsGraphData: function () {
        var bookings = [];
        var directBookingCount = { Name: 'Direct', Total: allBookingsGraphData.directBookingCount };
        var confirmedBookingCount = { Name: 'Confirmed', Total: allBookingsGraphData.confirmedBookingCount };
        var onholdBookingCount = { Name: 'On Hold', Total: allBookingsGraphData.onholdBookingCount };
        var cancelledBookingCount = { Name: 'Cancelled', Total: allBookingsGraphData.cancelledBookingCount };
        bookings.push(directBookingCount); bookings.push(confirmedBookingCount); bookings.push(onholdBookingCount); bookings.push(cancelledBookingCount); 
        setTimeout(function () {
            var ctx = document.getElementById("allBookingsChartCanvas").getContext("2d");
            var labels = [];
            var datas = [];
            var coloR = [];

            for (var i = 0; i < bookings.length; i++) {
                labels.push(bookings[i].Name);
                datas.push(bookings[i].Total);
                coloR.push(Dashboard.dynamicColors());
            }
            data = {
                datasets: [{
                    data: datas,
                    fill: false,
                    backgroundColor: coloR,
                    borderWidth: 1,
                }],
                labels: labels
            };
            var opt = {
                responsive: false,
                //maintainAspectRatio: false,
                title: { display: true, text: 'All Bookings Report' },
                legend: { position: 'bottom' },
                animationSteps: 60,
                animation: {
                    duration: 3000,
                }
            };
            if(allBookingsGraphData.directBookingCount==0 && allBookingsGraphData.confirmedBookingCount==0 && allBookingsGraphData.onholdBookingCount==0 && allBookingsGraphData.cancelledBookingCount==0) {
                ctx.fillText("No Data Available", 100,80);
                ctx.font="30px Comic Sans MS";
                ctx.fillStyle = "red";
                ctx.textAlign = "center";
                return false;
            }
            var myNewChart = new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: {
                    maintainAspectRatio: false,
                }
            });
        }, 200);
    },
    allPaymentsGraphData: function () {
        var payments = [];
        var unpaidCount = { Name: 'UnPaid', Total: allPaymentsGraphData.unpaidCount };
        var paidCount = { Name: 'Paid', Total: allPaymentsGraphData.paidCount };
        var creditCount = { Name: 'Credit', Total: allPaymentsGraphData.creditCount };
        var refundCount = { Name: 'Refund', Total: allPaymentsGraphData.refundCount };
        payments.push(unpaidCount); payments.push(paidCount); payments.push(creditCount); payments.push(refundCount); 
        setTimeout(function () {
            var ctx = document.getElementById("allPaymentsChartCanvas").getContext("2d");
            var labels = [];
            var datas = [];
            var coloR = [];

            for (var i = 0; i < payments.length; i++) {
                labels.push(payments[i].Name);
                datas.push(payments[i].Total);
                coloR.push(Dashboard.dynamicColors());
            }
            data = {
                datasets: [{
                    data: datas,
                    fill: false,
                    backgroundColor: coloR,
                    borderWidth: 1,
                }],
                labels: labels
            };
            var opt = {
                responsive: false,
                //maintainAspectRatio: false,
                title: { display: true, text: 'All Payments Report' },
                legend: { position: 'bottom' },
                animationSteps: 60,
                animation: {
                    duration: 3000,
                }
            };
            if(allPaymentsGraphData.unpaidCount==0 && allPaymentsGraphData.paidCount==0 && allPaymentsGraphData.creditCount==0 && allPaymentsGraphData.refundCount==0) {
                ctx.fillText("No Data Available", 100,80);
                ctx.font="30px Comic Sans MS";
                ctx.fillStyle = "red";
                ctx.textAlign = "center";
                return false;
            }
            var myNewChart = new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: {
                    maintainAspectRatio: false,
                }
            });
        }, 200);
    },
    listingsLiveMonthlyGraphData: function () {
        var ctx = document.getElementById("listingsAssignedVsConvertedChartCanvas");
        var months=listingsLiveMonthlyGraphData.listingMonths;
        var assigned=listingsLiveMonthlyGraphData.assignedListings;
        var converted=listingsLiveMonthlyGraphData.convertedListings;

        var assignedData = {
            label: 'Created Listings',
            data:  assigned.split(','),
            // data: ["3", "10", "3"],
            backgroundColor: Dashboard.dynamicColors(),
            borderWidth: 0,
        };
        var convertedData = {
            label: 'Live Listings',
            data: converted.split(','),
            // data: ["1", "8", "2"],
            backgroundColor: Dashboard.dynamicColors(),
            borderWidth: 0,
        };
        var listingsData = {
            // labels: ["Oct", "Nov", "Dec"],
            labels: months.split(','),
            datasets: [assignedData, convertedData]
        };
        setTimeout(function () {
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: listingsData,
                options: {
                    responsive: false,
                    animation: { 
                        duration: 3000,
                        xAxis: true,
                        yAxis: true,
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                barPercentage: 1,
                                categoryPercentage: 0.6,
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }, 200);
    },
    allPaymentsByCustomerGraphData: function () {
        var ctx = document.getElementById("allPaymentsByCustomerChartCanvas").getContext('2d');
        var customerName=allPaymentsByCustomerGraphData.customerName;
        var paidAmount=allPaymentsByCustomerGraphData.paidAmount;

        var paidAmountData = {
            label: 'Most Paid By Customers',
            data:  paidAmount.split(','),
            // data: ["3", "10", "3"],
            backgroundColor: Dashboard.dynamicColors(),
            borderWidth: 0,
        };
        var allPaymentsByCustomerData = {
            labels: customerName.split(','),
            datasets: [paidAmountData]
        };
        setTimeout(function () {
            const stackedBar = new Chart(ctx, {
                type: 'horizontalBar',
                data: allPaymentsByCustomerData,
                options: {
                    indexAxis: 'y',
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }, 200);
    },
    agentsRentListingsBarChart: function () {
        var ctx = document.getElementById("agentsRentListingsBarChartCanvas").getContext('2d');
        var agentName=agentsRentListings.agentName;
        var rent=agentsRentListings.rent;

        var rentData = {
            label: 'Rent Listings',
            data:  rent.split(','),
            // data: ["3", "10", "3"],
            backgroundColor: Dashboard.dynamicColors(),
            borderWidth: 0,
        };
        var agentsListingsRentData = {
            labels: agentName.split(','),
            datasets: [rentData]
        };
        setTimeout(function () {
            const stackedBar = new Chart(ctx, {
                type: 'horizontalBar',
                data: agentsListingsRentData,
                options: {
                    indexAxis: 'y',
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }, 200);
    },
    agentsSecondaryListingsBarChart: function () {
        var ctx = document.getElementById("agentsSecondaryListingsBarChartCanvas").getContext('2d');
        var agentName=agentsSecondaryListings.agentName;
        var secondary=agentsSecondaryListings.secondary;

        var secondaryData = {
            label: 'Secondary Listings',
            data:  secondary.split(','),
            // data: ["3", "10", "3"],
            backgroundColor: Dashboard.dynamicColors(),
            borderWidth: 0,
        };
        var agentsListingsSecondaryData = {
            labels: agentName.split(','),
            datasets: [secondaryData]
        };
        setTimeout(function () {
            const stackedBar = new Chart(ctx, {
                type: 'horizontalBar',
                data: agentsListingsSecondaryData,
                options: {
                    indexAxis: 'y',
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }, 200);
    },
    //2022 data
    allListingsGraphData2022: function () {
        var listings = [];
        var rentListing = { Name: 'Rent', Total: allListingsGraphData2022.rentListing };
        var secondaryListing = { Name: 'Secondary', Total: allListingsGraphData2022.secondaryListing };
        var offPlanListing = { Name: 'OFF Plan', Total: allListingsGraphData2022.offPlanListing };
        listings.push(rentListing); listings.push(secondaryListing); listings.push(offPlanListing); 
        setTimeout(function () {
            var ctx = document.getElementById("allListingsChartCanvas2022").getContext("2d");
            var labels = [];
            var datas = [];
            var coloR = [];

            for (var i = 0; i < listings.length; i++) {
                labels.push(listings[i].Name);
                datas.push(listings[i].Total);
                coloR.push(Dashboard.dynamicColors());
            }
            data = {
                datasets: [{
                    data: datas,
                    fill: false,
                    backgroundColor: coloR,
                    borderWidth: 1,
                }],
                labels: labels
            };
            var opt = {
                responsive: false,
                //maintainAspectRatio: false,
                title: { display: true, text: 'All Listings Report 2022' },
                legend: { position: 'bottom' },
                animationSteps: 60,
                animation: {
                    duration: 3000,
                }
            };
            if(allListingsGraphData2022.rentListing==0 && allListingsGraphData2022.secondaryListing==0 && allListingsGraphData2022.offPlanListing==0) {
                ctx.fillText("No Data Available", 100,80);
                ctx.font="30px Comic Sans MS";
                ctx.fillStyle = "red";
                ctx.textAlign = "center";
                return false;
            }
            var myNewChart = new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: {
                    maintainAspectRatio: false,
                }
            });
        }, 200);
    },
    allPaymentsGraphData2022: function () {
        var liveListings = [];
        var rentLiveListing = { Name: 'Rent', Total: allPaymentsGraphData2022.rentLiveListing };
        var secondaryLiveListing = { Name: 'Secondary', Total: allPaymentsGraphData2022.secondaryLiveListing };
        var offPlanLiveListing = { Name: 'OFF Plan', Total: allPaymentsGraphData2022.offPlanLiveListing };
        liveListings.push(rentLiveListing); liveListings.push(secondaryLiveListing); liveListings.push(offPlanLiveListing); 
        setTimeout(function () {
            var ctx = document.getElementById("allLiveListingsChartCanvas2022").getContext("2d");
            var labels = [];
            var datas = [];
            var coloR = [];

            for (var i = 0; i < liveListings.length; i++) {
                labels.push(liveListings[i].Name);
                datas.push(liveListings[i].Total);
                coloR.push(Dashboard.dynamicColors());
            }
            data = {
                datasets: [{
                    data: datas,
                    fill: false,
                    backgroundColor: coloR,
                    borderWidth: 1,
                }],
                labels: labels
            };
            var opt = {
                responsive: false,
                //maintainAspectRatio: false,
                title: { display: true, text: 'All Live Listings Report 2022' },
                legend: { position: 'bottom' },
                animationSteps: 60,
                animation: {
                    duration: 3000,
                }
            };
            if(allPaymentsGraphData2022.rentLiveListing==0 && allPaymentsGraphData2022.secondaryLiveListing==0 && allPaymentsGraphData2022.offPlanLiveListing==0) {
                ctx.fillText("No Data Available", 100,80);
                ctx.font="30px Comic Sans MS";
                ctx.fillStyle = "red";
                ctx.textAlign = "center";
                return false;
            }
            var myNewChart = new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: {
                    maintainAspectRatio: false,
                }
            });
        }, 200);
    },
    listingsLiveMonthlyGraphData2022: function () {
        var ctx = document.getElementById("listingsAssignedVsConvertedChartCanvas2022");
        var months=listingsLiveMonthlyGraphData2022.listingMonths;
        var assigned=listingsLiveMonthlyGraphData2022.assignedListings;
        var converted=listingsLiveMonthlyGraphData2022.convertedListings;

        var assignedData = {
            label: 'Created Listings',
            data:  assigned.split(','),
            // data: ["3", "10", "3"],
            backgroundColor: Dashboard.dynamicColors(),
            borderWidth: 0,
        };
        var convertedData = {
            label: 'Live Listings',
            data: converted.split(','),
            // data: ["1", "8", "2"],
            backgroundColor: Dashboard.dynamicColors(),
            borderWidth: 0,
        };
        var listingsData = {
            // labels: ["Oct", "Nov", "Dec"],
            labels: months.split(','),
            datasets: [assignedData, convertedData]
        };
        setTimeout(function () {
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: listingsData,
                options: {
                    responsive: false,
                    animation: { 
                        duration: 3000,
                        xAxis: true,
                        yAxis: true,
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                barPercentage: 1,
                                categoryPercentage: 0.6,
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }, 200);
    },
    agentsOffPlanListingsBarChart2022: function () {
        var ctx = document.getElementById("agentsOffPlanListingsBarChartCanvas2022").getContext('2d');
        var agentName=agentsOffplanListings2022.agentName;
        var offplan=agentsOffplanListings2022.offplan;

        var offplanData = {
            label: 'OFF Plan Listings',
            data:  offplan.split(','),
            // data: ["3", "10", "3"],
            backgroundColor: Dashboard.dynamicColors(),
            borderWidth: 0,
        };
        var agentsListingsOffplanData = {
            labels: agentName.split(','),
            datasets: [offplanData]
        };
        setTimeout(function () {
            const stackedBar = new Chart(ctx, {
                type: 'horizontalBar',
                data: agentsListingsOffplanData,
                options: {
                    indexAxis: 'y',
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }, 200);
    },
    agentsRentListingsBarChart2022: function () {
        var ctx = document.getElementById("agentsRentListingsBarChartCanvas2022").getContext('2d');
        var agentName=agentsRentListings2022.agentName;
        var rent=agentsRentListings2022.rent;

        var rentData = {
            label: 'Rent Listings',
            data:  rent.split(','),
            // data: ["3", "10", "3"],
            backgroundColor: Dashboard.dynamicColors(),
            borderWidth: 0,
        };
        var agentsListingsRentData = {
            labels: agentName.split(','),
            datasets: [rentData]
        };
        setTimeout(function () {
            const stackedBar = new Chart(ctx, {
                type: 'horizontalBar',
                data: agentsListingsRentData,
                options: {
                    indexAxis: 'y',
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }, 200);
    },
    agentsSecondaryListingsBarChart2022: function () {
        var ctx = document.getElementById("agentsSecondaryListingsBarChartCanvas2022").getContext('2d');
        var agentName=agentsSecondaryListings2022.agentName;
        var secondary=agentsSecondaryListings2022.secondary;

        var secondaryData = {
            label: 'Secondary Listings',
            data:  secondary.split(','),
            // data: ["3", "10", "3"],
            backgroundColor: Dashboard.dynamicColors(),
            borderWidth: 0,
        };
        var agentsListingsSecondaryData = {
            labels: agentName.split(','),
            datasets: [secondaryData]
        };
        setTimeout(function () {
            const stackedBar = new Chart(ctx, {
                type: 'horizontalBar',
                data: agentsListingsSecondaryData,
                options: {
                    indexAxis: 'y',
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }, 200);
    },
    //2023 data
    allListingsGraphData2023: function () {
        var listings = [];
        var rentListing = { Name: 'Rent', Total: allListingsGraphData2023.rentListing };
        var secondaryListing = { Name: 'Secondary', Total: allListingsGraphData2023.secondaryListing };
        var offPlanListing = { Name: 'OFF Plan', Total: allListingsGraphData2023.offPlanListing };
        listings.push(rentListing); listings.push(secondaryListing); listings.push(offPlanListing); 
        setTimeout(function () {
            var ctx = document.getElementById("allListingsChartCanvas2023").getContext("2d");
            var labels = [];
            var datas = [];
            var coloR = [];

            for (var i = 0; i < listings.length; i++) {
                labels.push(listings[i].Name);
                datas.push(listings[i].Total);
                coloR.push(Dashboard.dynamicColors());
            }
            data = {
                datasets: [{
                    data: datas,
                    fill: false,
                    backgroundColor: coloR,
                    borderWidth: 1,
                }],
                labels: labels
            };
            var opt = {
                responsive: false,
                //maintainAspectRatio: false,
                title: { display: true, text: 'All Listings Report 2023' },
                legend: { position: 'bottom' },
                animationSteps: 60,
                animation: {
                    duration: 3000,
                }
            };
            if(allListingsGraphData2023.rentListing==0 && allListingsGraphData2023.secondaryListing==0 && allListingsGraphData2023.offPlanListing==0) {
                ctx.fillText("No Data Available", 100,80);
                ctx.font="30px Comic Sans MS";
                ctx.fillStyle = "red";
                ctx.textAlign = "center";
                return false;
            }
            var myNewChart = new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: {
                    maintainAspectRatio: false,
                }
            });
        }, 200);
    },
    allPaymentsGraphData2023: function () {
        var liveListings = [];
        var rentLiveListing = { Name: 'Rent', Total: allPaymentsGraphData2023.rentLiveListing };
        var secondaryLiveListing = { Name: 'Secondary', Total: allPaymentsGraphData2023.secondaryLiveListing };
        var offPlanLiveListing = { Name: 'OFF Plan', Total: allPaymentsGraphData2023.offPlanLiveListing };
        liveListings.push(rentLiveListing); liveListings.push(secondaryLiveListing); liveListings.push(offPlanLiveListing); 
        setTimeout(function () {
            var ctx = document.getElementById("allLiveListingsChartCanvas2023").getContext("2d");
            var labels = [];
            var datas = [];
            var coloR = [];

            for (var i = 0; i < liveListings.length; i++) {
                labels.push(liveListings[i].Name);
                datas.push(liveListings[i].Total);
                coloR.push(Dashboard.dynamicColors());
            }
            data = {
                datasets: [{
                    data: datas,
                    fill: false,
                    backgroundColor: coloR,
                    borderWidth: 1,
                }],
                labels: labels
            };
            var opt = {
                responsive: false,
                //maintainAspectRatio: false,
                title: { display: true, text: 'All Live Listings Report 2023' },
                legend: { position: 'bottom' },
                animationSteps: 60,
                animation: {
                    duration: 3000,
                }
            };
            if(allPaymentsGraphData2023.rentLiveListing==0 && allPaymentsGraphData2023.secondaryLiveListing==0 && allPaymentsGraphData2023.offPlanLiveListing==0) {
                ctx.fillText("No Data Available", 100,80);
                ctx.font="30px Comic Sans MS";
                ctx.fillStyle = "red";
                ctx.textAlign = "center";
                return false;
            }
            var myNewChart = new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: {
                    maintainAspectRatio: false,
                }
            });
        }, 200);
    },
    // listingsLiveMonthlyGraphData2023: function () {
    //     var ctx = document.getElementById("listingsAssignedVsConvertedChartCanvas2023");
    //     var months=listingsLiveMonthlyGraphData2023.listingMonths;
    //     var assigned=listingsLiveMonthlyGraphData2023.assignedListings;
    //     var converted=listingsLiveMonthlyGraphData2023.convertedListings;

    //     var assignedData = {
    //         label: 'Created Listings',
    //         data:  assigned.split(','),
    //         // data: ["3", "10", "3"],
    //         backgroundColor: Dashboard.dynamicColors(),
    //         borderWidth: 0,
    //     };
    //     var convertedData = {
    //         label: 'Live Listings',
    //         data: converted.split(','),
    //         // data: ["1", "8", "2"],
    //         backgroundColor: Dashboard.dynamicColors(),
    //         borderWidth: 0,
    //     };
    //     var listingsData = {
    //         // labels: ["Oct", "Nov", "Dec"],
    //         labels: months.split(','),
    //         datasets: [assignedData, convertedData]
    //     };
    //     setTimeout(function () {
    //         var myChart = new Chart(ctx, {
    //             type: 'bar',
    //             data: listingsData,
    //             options: {
    //                 responsive: false,
    //                 animation: { 
    //                     duration: 3000,
    //                     xAxis: true,
    //                     yAxis: true,
    //                 },
    //                 scales: {
    //                     xAxes: [{
    //                         ticks: {
    //                             barPercentage: 1,
    //                             categoryPercentage: 0.6,
    //                         }
    //                     }],
    //                     yAxes: [{
    //                         ticks: {
    //                             beginAtZero: true
    //                         }
    //                     }]
    //                 }
    //             }
    //         });
    //     }, 200);
    // },
    // agentsOffPlanListingsBarChart2023: function () {
    //     var ctx = document.getElementById("agentsOffPlanListingsBarChartCanvas2023").getContext('2d');
    //     var agentName=agentsOffplanListings2023.agentName;
    //     var offplan=agentsOffplanListings2023.offplan;

    //     var offplanData = {
    //         label: 'OFF Plan Listings',
    //         data:  offplan.split(','),
    //         // data: ["3", "10", "3"],
    //         backgroundColor: Dashboard.dynamicColors(),
    //         borderWidth: 0,
    //     };
    //     var agentsListingsOffplanData = {
    //         labels: agentName.split(','),
    //         datasets: [offplanData]
    //     };
    //     setTimeout(function () {
    //         const stackedBar = new Chart(ctx, {
    //             type: 'horizontalBar',
    //             data: agentsListingsOffplanData,
    //             options: {
    //                 indexAxis: 'y',
    //                 scales: {
    //                     xAxes: [{
    //                         ticks: {
    //                             beginAtZero: true
    //                         }
    //                     }]
    //                 }
    //             }
    //         });
    //     }, 200);
    // },
    // agentsRentListingsBarChart2023: function () {
    //     var ctx = document.getElementById("agentsRentListingsBarChartCanvas2023").getContext('2d');
    //     var agentName=agentsRentListings2023.agentName;
    //     var rent=agentsRentListings2023.rent;

    //     var rentData = {
    //         label: 'Rent Listings',
    //         data:  rent.split(','),
    //         // data: ["3", "10", "3"],
    //         backgroundColor: Dashboard.dynamicColors(),
    //         borderWidth: 0,
    //     };
    //     var agentsListingsRentData = {
    //         labels: agentName.split(','),
    //         datasets: [rentData]
    //     };
    //     setTimeout(function () {
    //         const stackedBar = new Chart(ctx, {
    //             type: 'horizontalBar',
    //             data: agentsListingsRentData,
    //             options: {
    //                 indexAxis: 'y',
    //                 scales: {
    //                     xAxes: [{
    //                         ticks: {
    //                             beginAtZero: true
    //                         }
    //                     }]
    //                 }
    //             }
    //         });
    //     }, 200);
    // },
    // agentsSecondaryListingsBarChart2023: function () {
    //     var ctx = document.getElementById("agentsSecondaryListingsBarChartCanvas2023").getContext('2d');
    //     var agentName=agentsSecondaryListings2023.agentName;
    //     var secondary=agentsSecondaryListings2023.secondary;

    //     var secondaryData = {
    //         label: 'Secondary Listings',
    //         data:  secondary.split(','),
    //         // data: ["3", "10", "3"],
    //         backgroundColor: Dashboard.dynamicColors(),
    //         borderWidth: 0,
    //     };
    //     var agentsListingsSecondaryData = {
    //         labels: agentName.split(','),
    //         datasets: [secondaryData]
    //     };
    //     setTimeout(function () {
    //         const stackedBar = new Chart(ctx, {
    //             type: 'horizontalBar',
    //             data: agentsListingsSecondaryData,
    //             options: {
    //                 indexAxis: 'y',
    //                 scales: {
    //                     xAxes: [{
    //                         ticks: {
    //                             beginAtZero: true
    //                         }
    //                     }]
    //                 }
    //             }
    //         });
    //     }, 200);
    // },
    customerName: function () {
        $.ajax({
            type: 'POST',
            url: 'index.php?module=Home&action=getCustomerNames&sugar_body_only=true',
            success: function(data) {
              var data= $.parseJSON(data);
                $("#customer_name option").remove();
                $('#customer_name').append('<option value=""></option>');
                $.each(data, function(i,item){
                  $('#customer_name').append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
                });
            },
            error: function (request, status, errorThrown) {
                console.log(request + ' ' + status + ' ' + errorThrown);
            }
        });
    },
    // contactsGraph: function () {
    //     var contacts = [];
    //     var newContact = { Name: 'New', Total: contactkGraphData.new_contact_count };
    //     var datacollContact = { Name: 'Data Collection', Total: contactkGraphData.datacol_contact_count };
    //     var assignedContact = { Name: 'Assigned To Admission', Total: contactkGraphData.assigned_contact_count };
    //     var readyForAppContact = { Name: 'Ready For Application', Total: contactkGraphData.readyforapp_contact_count };
    //     var admAppliedContact = { Name: 'Admission Applied', Total: contactkGraphData.admapplied_contact_count };
    //     contacts.push(newContact); contacts.push(datacollContact); contacts.push(assignedContact);contacts.push(readyForAppContact);contacts.push(admAppliedContact);
    //     setTimeout(function () {
    //         var ctx = document.getElementById("contactsChartCanvas").getContext("2d");
    //         var labels = [];
    //         var datas = [];
    //         var coloR = [];

    //         for (var i = 0; i < contacts.length; i++) {
    //             labels.push(contacts[i].Name);
    //             datas.push(contacts[i].Total);
    //             coloR.push(Dashboard.dynamicColors());
    //         }
    //         data = {
    //             datasets: [{
    //                 data: datas,
    //                 fill: false,
    //                 backgroundColor: coloR,
    //                 borderWidth: 1
    //             }],
    //             labels: labels
    //         };
    //         var opt = {
    //             responsive: false,
    //             //maintainAspectRatio: false,
    //             title: { display: true, text: 'Percentage' },
    //             legend: {  display: false },
    //             animationSteps: 60,
    //             animation: {
    //                 duration: 3000,
    //             }
    //         };

    //         if(contactkGraphData.new_contact_count==0 && contactkGraphData.datacol_contact_count==0 && contactkGraphData.assigned_contact_count==0 &&  contactkGraphData.readyforapp_contact_count==0 && contactkGraphData.admapplied_contact_count==0 ) {
    //             ctx.fillText("No Data Available", 100,80);
    //             ctx.font="30px Comic Sans MS";
    //             ctx.fillStyle = "red";
    //             ctx.textAlign = "center";
    //             return false;
    //         }
    //         var myNewChart = new Chart(ctx, {
    //             type: 'doughnut',
    //             data: data,
    //             options: opt
    //         });
    //     }, 200);
    // },
    //     activitiesGraphData: function () {
    //     var activities = [];
    //     var calls = { Name: 'Calls', Total: activitiesGraphData.Calls };
    //     var meetings = { Name: 'Meetings', Total: activitiesGraphData.Meetings };
    //     var tasks = { Name: 'Tasks', Total: activitiesGraphData.Tasks };
    //     activities.push(calls); activities.push(meetings); activities.push(tasks);
    //     setTimeout(function () {
    //         var ctx = document.getElementById("activitiesChartCanvas").getContext("2d");
    //         var labels = [];
    //         var datas = [];
    //         var coloR = [];

    //         for (var i = 0; i < activities.length; i++) {
    //             labels.push(activities[i].Name);
    //             datas.push(activities[i].Total);
    //             coloR.push(Dashboard.dynamicColors());
    //         }
    //         data = {
    //             datasets: [{
    //                 data: datas,
    //                 fill: false,
    //                 backgroundColor: coloR,
    //                 borderWidth: 1
    //             }],
    //             labels: labels
    //         };
    //         var opt = {
    //             responsive: false,
    //             //maintainAspectRatio: false,
    //             title: { display: true, text: 'Activities Report' },
    //             legend: { position: 'bottom' },
    //             animationSteps: 60,
    //             animation: {
    //                 duration: 3000,
    //             }
    //         };
    //         if(activitiesGraphData.calls==0 && activitiesGraphData.meetings==0 && activitiesGraphData.tasks==0) {
    //             ctx.fillText("No Data Available", 100,80);
    //             ctx.font="30px Comic Sans MS";
    //             ctx.fillStyle = "red";
    //             ctx.textAlign = "center";
    //             return false;
    //         }
    //         var myNewChart = new Chart(ctx, {
    //             type: 'doughnut',
    //             data: data,
    //             options: opt
    //         });
    //     }, 200);
    // },

    // tasksGraph: function () {

    //     var tasks = [];
    //     var completedOnTime = { Name: 'Completed', Total: taskGraphData.tasksCompletedOnTime };
    //     var completedLate = { Name: 'Not Completed', Total: taskGraphData.tasksCompletedLate };
    //     tasks.push(completedOnTime); tasks.push(completedLate);

    //     setTimeout(function () {
    //         var ctx = document.getElementById("countriesChartCanvas").getContext("2d");
    //         var labels = [];
    //         var datas = [];
    //         var coloR = [];

    //         for (var i = 0; i < tasks.length; i++) {
    //             labels.push(tasks[i].Name);
    //             datas.push(tasks[i].Total);
    //             coloR.push(Dashboard.dynamicColors());
    //         }
    //         data = {
    //             datasets: [{
    //                 data: datas,
    //                 fill: false,
    //                 backgroundColor: coloR,
    //                 borderWidth: 1 
    //             }],
    //             labels: labels
    //         };
    //         var opt = {  
    //             responsive: false,
    //             //maintainAspectRatio: false,
    //             title: { display: true, text: 'Tasks Percentage' },  
    //             legend: { position: 'bottom' },
    //             animationSteps: 60,
    //             animation: {
	// 			    duration: 3000,
	// 		    }
    //         };
    //         if(taskGraphData.tasksCompletedLate==0 && taskGraphData.tasksCompletedOnTime==0) {
    //             ctx.fillText("No Data Available", 100,80);
    //             ctx.font="30px Comic Sans MS";
    //             ctx.fillStyle = "red";
    //             ctx.textAlign = "center";
    //             return false;
    //         }
    //         var myNewChart = new Chart(ctx, {  
    //             type: 'doughnut',  
    //             data: data,  
    //             options: opt  
    //         });
    //     }, 200);
    // },
    dynamicColors: function() {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        return "rgb(" + r + "," + g + "," + b + ")";
    },
}