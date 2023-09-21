var CEODashboard = {
    setupDataForLeads: function (data) {

        leadsBySourceArray = [];
        leadsByStatusArray = [];
        ContactsByStageArray = [];
        ContactsBySourceArray = [];
        OpportunityBySalesStageArray = [];
        ApplicationByStatusArray = [];
        if (data != null && data.GroupsData != null && data.GroupsData.length > 0) {
            var datalen = data.GroupsData.length;
            for (var i = 0; i < datalen; i++) {
                var leadsBySourceArrayForOneGroup = [];
                var leadsByStatusArrayForOneGroup = [];
                var ContactsByStageArrayForOneGroup = [];
                var ContactsBySourceArrayForOneGroup = [];
                var OpportunityBySalesStageArrayForOneGroup = [];
                var ApplicationByStatusArrayForOneGroup = [];
                var oneGroup = data.GroupsData[i];
                var oneGroupId = oneGroup.GroupId;
                //****************************************************************************************
                //handle the Lead-Source data
                //****************************************************************************************
                if (oneGroup.LeadsBySource != null) {
                    var leadsBySourceStr = oneGroup.LeadsBySource;
                    var leadsBySourcesSplittedArray = leadsBySourceStr.split(',');
                    if (leadsBySourcesSplittedArray && leadsBySourcesSplittedArray.length > 0) {
                        var lbs = leadsBySourcesSplittedArray.length;
                        for (var j = 0; j < lbs; j++) {
                            var oneSplitted = leadsBySourcesSplittedArray[j];
                            //oneSplitted will be in the form of 'Email|9'. we need to split it further by pipe
                            var l = oneSplitted.split('|');
                            if (l != null && l.length > 0) {
                                var leadSource = 'Unknown'; //to handle blanks
                                var leadSourceCount = 0;
                                if (l.length == 1) {
                                    leadSourceCount = l[0];
                                } else if(l.length == 2) {
                                    leadSource = l[0];
                                    leadSourceCount = l[1];
                                }
                                leadSource = leadSource.trim();
                                if (leadSource == '') leadSource = 'Unknown';
                                if (leadSource != null && leadSource != '' && leadSourceCount != null) {
                                    leadSourceCount = +leadSourceCount;
                                    var oneLeadSource = { Name: leadSource, Total: +leadSourceCount };
                                    leadsBySourceArrayForOneGroup.push(oneLeadSource);
                                }
                            }
                        }
                        leadsBySourceArray.push({GroupId: oneGroupId, IsParent: true, LeadsBySourceData: leadsBySourceArrayForOneGroup })
                    }
                }
                //****************************************************************************************
                //handle the Lead Status data
                //****************************************************************************************
                if (oneGroup.LeadsByStatus != null) {
                    var leadsByStatusStr = oneGroup.LeadsByStatus;
                    var leadsByStatusSplittedArray = leadsByStatusStr.split(',');
                    if (leadsByStatusSplittedArray && leadsByStatusSplittedArray.length > 0) {
                        var lbs = leadsByStatusSplittedArray.length;
                        for (var j = 0; j < lbs; j++) {
                            var oneSplitted = leadsByStatusSplittedArray[j];
                            //oneSplitted will be in the form of 'Converted|9'. we need to split it further by pipe
                            var l = oneSplitted.split('|');
                            if (l != null && l.length > 0) {
                                var leadStatus = 'Unknown'; //to handle blanks
                                var leadStatusCount = 0;
                                if (l.length == 1) {
                                    leadStatusCount = l[0];
                                } else if(l.length == 2) {
                                    leadStatus = l[0];
                                    leadStatusCount = l[1];
                                }
                                leadStatus = leadStatus.trim();
                                if (leadStatus == '') leadStatus = 'Unknown';
                                if (leadStatus != null && leadStatus != '' && leadStatusCount != null) {
                                    leadStatusCount = +leadStatusCount;
                                    var oneLeadStatus = { Name: leadStatus, Total: +leadStatusCount };
                                    leadsByStatusArrayForOneGroup.push(oneLeadStatus);
                                }
                            }
                        }
                        leadsByStatusArray.push({GroupId: oneGroupId, IsParent: true, LeadsByStatusData: leadsByStatusArrayForOneGroup});
                    }
                }
				
				//****************************************************************************************
                //handle the Contacts Stages data
                //****************************************************************************************
               if (oneGroup.ContactsByStage != null) {
                    var ContactsByStageStr = oneGroup.ContactsByStage;
                    var ContactsByStageSplittedArray = ContactsByStageStr.split(',');
                    if (ContactsByStageSplittedArray && ContactsByStageSplittedArray.length > 0) {
                        var lbs = ContactsByStageSplittedArray.length;
                        for (var j = 0; j < lbs; j++) {
                            var oneSplitted = ContactsByStageSplittedArray[j];
                            //oneSplitted will be in the form of 'Converted|9'. we need to split it further by pipe
                            var l = oneSplitted.split('|');
                            if (l != null && l.length > 0) {
                                var ContactsStage = 'Unknown'; //to handle blanks
                                var ContactsStageCount = 0;
                                if (l.length == 1) {
                                    ContactsStageCount = l[0];
                                } else if(l.length == 2) {
                                    ContactsStage = l[0];
                                    ContactsStageCount = l[1];
                                }
                                ContactsStage = ContactsStage.trim();
                                if (ContactsStage == '') ContactsStage = 'Unknown';
                                if (ContactsStage != null && ContactsStage != '' && ContactsStageCount != null) {
                                    ContactsStageCount = +ContactsStageCount;
                                    var oneContactsStage = { Name: ContactsStage, Total: +ContactsStageCount };
                                    ContactsByStageArrayForOneGroup.push(oneContactsStage);
                                }
                            }
                        }
                        ContactsByStageArray.push({GroupId: oneGroupId, IsParent: true, ContactsByStageData: ContactsByStageArrayForOneGroup});
                    }
                }
				
				//****************************************************************************************
                //handle the Contacts Source data
                //****************************************************************************************
               if (oneGroup.ContactsBySource != null) {
                    var ContactsBySourceStr = oneGroup.ContactsBySource;
                    var ContactsBySourceSplittedArray = ContactsBySourceStr.split(',');
                    if (ContactsBySourceSplittedArray && ContactsBySourceSplittedArray.length > 0) {
                        var lbs = ContactsBySourceSplittedArray.length;
                        for (var j = 0; j < lbs; j++) {
                            var oneSplitted = ContactsBySourceSplittedArray[j];
                            //oneSplitted will be in the form of 'Converted|9'. we need to split it further by pipe
                            var l = oneSplitted.split('|');
                            if (l != null && l.length > 0) {
                                var ContactsSource = 'Unknown'; //to handle blanks
                                var ContactsSourceCount = 0;
                                if (l.length == 1) {
                                    ContactsSourceCount = l[0];
                                } else if(l.length == 2) {
                                    ContactsSource = l[0];
                                    ContactsSourceCount = l[1];
                                }
                                ContactsSource = ContactsSource.trim();
                                if (ContactsSource == '') ContactsSource = 'Unknown';
                                if (ContactsSource != null && ContactsSource != '' && ContactsSourceCount != null) {
                                    ContactsSourceCount = +ContactsSourceCount;
                                    var oneContactsSource = { Name: ContactsSource, Total: +ContactsSourceCount };
                                    ContactsBySourceArrayForOneGroup.push(oneContactsSource);
                                }
                            }
                        }
                        ContactsBySourceArray.push({GroupId: oneGroupId, IsParent: true, ContactsBySourceData: ContactsBySourceArrayForOneGroup});
                    }
                }
				//****************************************************************************************
                //handle the Opportunity By Sales Stage
                //****************************************************************************************
               if (oneGroup.OpportunityBySalesStage != null) {
                    var OpportunityBySalesStageStr = oneGroup.OpportunityBySalesStage;
                    var OpportunityBySalesStageSplittedArray = OpportunityBySalesStageStr.split(',');
                    if (OpportunityBySalesStageSplittedArray && OpportunityBySalesStageSplittedArray.length > 0) {
                        var lbs = OpportunityBySalesStageSplittedArray.length;
                        for (var j = 0; j < lbs; j++) {
                            var oneSplitted = OpportunityBySalesStageSplittedArray[j];
                            //oneSplitted will be in the form of 'Converted|9'. we need to split it further by pipe
                            var l = oneSplitted.split('|');
                            if (l != null && l.length > 0) {
                                var OpportunitySalesStage = 'Unknown'; //to handle blanks
                                var OpportunitySalesStageCount = 0;
                                if (l.length == 1) {
                                    OpportunitySalesStageCount = l[0];
                                } else if(l.length == 2) {
                                    OpportunitySalesStage = l[0];
                                    OpportunitySalesStageCount = l[1];
                                }
                                OpportunitySalesStage = OpportunitySalesStage.trim();
                                if (OpportunitySalesStage == '') OpportunitySalesStage = 'Unknown';
                                if (OpportunitySalesStage != null && OpportunitySalesStage != '' && OpportunitySalesStageCount != null) {
                                    OpportunitySalesStageCount = +OpportunitySalesStageCount;
                                    var oneOpportunitySalesStage = { Name: OpportunitySalesStage, Total: +OpportunitySalesStageCount };
                                    OpportunityBySalesStageArrayForOneGroup.push(oneOpportunitySalesStage);
                                }
                            }
                        }
                        OpportunityBySalesStageArray.push({GroupId: oneGroupId, IsParent: true, OpportunityBySalesStageData: OpportunityBySalesStageArrayForOneGroup});
                    }
                }
				//****************************************************************************************
                //handle the Application By Status
                //****************************************************************************************
               if (oneGroup.ApplicationByStatus != null) {
                    var ApplicationByStatusStr = oneGroup.ApplicationByStatus;
                    var ApplicationByStatusSplittedArray = ApplicationByStatusStr.split(',');
                    if (ApplicationByStatusSplittedArray && ApplicationByStatusSplittedArray.length > 0) {
                        var lbs = ApplicationByStatusSplittedArray.length;
                        for (var j = 0; j < lbs; j++) {
                            var oneSplitted = ApplicationByStatusSplittedArray[j];
                            //oneSplitted will be in the form of 'Converted|9'. we need to split it further by pipe
                            var l = oneSplitted.split('|');
                            if (l != null && l.length > 0) {
                                var ApplicationStatus = 'Unknown'; //to handle blanks
                                var ApplicationStatusCount = 0;
                                if (l.length == 1) {
                                    ApplicationStatusCount = l[0];
                                } else if(l.length == 2) {
                                    ApplicationStatus = l[0];
                                    ApplicationStatusCount = l[1];
                                }
                                ApplicationStatus = ApplicationStatus.trim();
                                if (ApplicationStatus == '') ApplicationStatus = 'Unknown';
                                if (ApplicationStatus != null && ApplicationStatus != '' && ApplicationStatusCount != null) {
                                    ApplicationStatusCount = +ApplicationStatusCount;
                                    var oneApplicationStatus = { Name: ApplicationStatus, Total: +ApplicationStatusCount };
                                    ApplicationByStatusArrayForOneGroup.push(oneApplicationStatus);
                                }
                            }
                        }
                        ApplicationByStatusArray.push({GroupId: oneGroupId, IsParent: true, ApplicationByStatusData: ApplicationByStatusArrayForOneGroup});
                    }
                }
				
				
            }
        }
    },
    composeLeadCharts: function () {

        //**********************************************************************
        //lets create donut chart for Lead-Source
        //**********************************************************************
        if (leadsBySourceArray != null && leadsBySourceArray.length > 0) {
            var len = leadsBySourceArray.length;
            for (var j = 0; j < len; j++) {

                var oneLSourse = leadsBySourceArray[j];
                if (oneLSourse) {
                    //get the canvas using the group id
                    // setTimeout(function () {
						if (j==0) {
							var ctx1 = document.getElementById("leadsBySourceCanvas_"+oneLSourse.GroupId).getContext("2d");
							var labels1 = [];
							var datas1 = [];
							var coloR1 = [];
							for (var i = 0; i < oneLSourse.LeadsBySourceData.length; i++) {
								labels1.push(oneLSourse.LeadsBySourceData[i].Name);
								datas1.push(oneLSourse.LeadsBySourceData[i].Total);
								coloR1.push(CEODashboard.dynamicColors());
							}
							data1 = {
								datasets: [{
									data: datas1,
									fill: false,
									backgroundColor: coloR1,
									borderWidth: 1 
								}],
								labels: labels1
							};
							var opt1 = {  
								responsive: false,
								//maintainAspectRatio: false,
								title: { display: true, text: 'Leads By Source' },  
								legend: { display: false, position: 'bottom' },
								animationSteps: 60,
								animation: {
									duration: 3000,
								}
							};
							var myNewChart1 = new Chart(ctx1, {  
								type: 'doughnut',  
								data: data1,  
								options: opt1  
							});
						} else {
							var ctx2 = document.getElementById("leadsBySourceCanvas_"+oneLSourse.GroupId).getContext("2d");
							var labels1 = [];
							var datas1 = [];
							var coloR1 = [];
							for (var i = 0; i < oneLSourse.LeadsBySourceData.length; i++) {
								labels1.push(oneLSourse.LeadsBySourceData[i].Name);
								datas1.push(oneLSourse.LeadsBySourceData[i].Total);
								coloR1.push(CEODashboard.dynamicColors());
							}
							data2 = {
								datasets: [{
									data: datas1,
									fill: false,
									backgroundColor: coloR1,
									borderWidth: 1 
								}],
								labels: labels1
							};
							var opt1 = {  
								responsive: false,
								//maintainAspectRatio: false,
								title: { display: true, text: 'Leads By Source' },  
								legend: { display: false, position: 'bottom' },
								animationSteps: 60,
								animation: {
									duration: 3000,
								}
							};
							var myNewChart1 = new Chart(ctx2, {  
								type: 'doughnut', 
								data: data2,  
								options: opt1  
							});
						}
                        

                    // }, 250);
                }
            }
        }
        //**********************************************************************
        //lets create donut chart for Lead-Status
        //**********************************************************************
        if (leadsByStatusArray != null && leadsByStatusArray.length > 0) {
            var len = leadsByStatusArray.length;
            for (var j = 0; j < len; j++) {
                var oneLStatus = leadsByStatusArray[j];
                if (oneLStatus) {
                    //get the canvas using the group id
                    // setTimeout(function () {
                        var ctx = document.getElementById("leadsByStatusCanvas_"+oneLStatus.GroupId).getContext("2d");
                        var labels = [];
                        var datas = [];
                        var coloR = [];
                        for (var i = 0; i < oneLStatus.LeadsByStatusData.length; i++) {
                            labels.push(oneLStatus.LeadsByStatusData[i].Name);
                            datas.push(oneLStatus.LeadsByStatusData[i].Total);
                            coloR.push(CEODashboard.dynamicColors());
                        }
                        data = {
                            datasets: [{
                                data: datas,
                                fill: false,
                                backgroundColor: coloR,
                                borderWidth: 1 
                            }],
                            labels: labels
                        };
                        var opt = {  
                            responsive: false,
                            //maintainAspectRatio: false,
                            title: { display: true, text: 'Leads By Status' },  
                            legend: { display: false, position: 'bottom' },
                            animationSteps: 60,
                            animation: {
                                duration: 3000,
                            }
                        };
                        var myNewChart = new Chart(ctx, {  
                            type: 'doughnut',  
                            data: data,  
                            options: opt  
                        });
                    // }, 200);
                } 
            }
        }
		
		//**********************************************************************
        //lets create donut chart for Contact-Stage
        //**********************************************************************
       if (ContactsByStageArray != null && ContactsByStageArray.length > 0) {
            var len = ContactsByStageArray.length;
            for (var j = 0; j < len; j++) {
                var oneCStage = ContactsByStageArray[j];
                if (oneCStage) {
                    //get the canvas using the group id
                    // setTimeout(function () {
                        var ctx = document.getElementById("ContactsByStageCanvas_"+oneCStage.GroupId).getContext("2d");
                        var labels = [];
                        var datas = [];
                        var coloR = [];
                        for (var i = 0; i < oneCStage.ContactsByStageData.length; i++) {
                            labels.push(oneCStage.ContactsByStageData[i].Name);
                            datas.push(oneCStage.ContactsByStageData[i].Total);
                            coloR.push(CEODashboard.dynamicColors());
                        }
                        data = {
                            datasets: [{
                                data: datas,
                                fill: false,
                                backgroundColor: coloR,
                                borderWidth: 1 
                            }],
                            labels: labels
                        };
                        var opt = {  
                            responsive: false,
                            //maintainAspectRatio: false,
                            title: { display: true, text: 'Contacts By Stage' },  
                            legend: { display: false, position: 'bottom' },
                            animationSteps: 60,
                            animation: {
                                duration: 3000,
                            }
                        };
                        var myNewChart = new Chart(ctx, {  
                            type: 'doughnut',  
                            data: data,  
                            options: opt  
                        });
                    // }, 200);
                } 
            }
        }
		//**********************************************************************
        //lets create donut chart for Contact-Source
        //**********************************************************************
       if (ContactsBySourceArray != null && ContactsBySourceArray.length > 0) {
            var len = ContactsBySourceArray.length;
            for (var j = 0; j < len; j++) {
                var oneCSource = ContactsBySourceArray[j];
                if (oneCSource) {
                    //get the canvas using the group id
                        var ctx = document.getElementById("ContactsBySourceCanvas_"+oneCSource.GroupId).getContext("2d");
                        var labels = [];
                        var datas = [];
                        var coloR = [];
                        for (var i = 0; i < oneCSource.ContactsBySourceData.length; i++) {
                            labels.push(oneCSource.ContactsBySourceData[i].Name);
                            datas.push(oneCSource.ContactsBySourceData[i].Total);
                            coloR.push(CEODashboard.dynamicColors());
                        }
                        data = {
                            datasets: [{
                                data: datas,
                                fill: false,
                                backgroundColor: coloR,
                                borderWidth: 1 
                            }],
                            labels: labels
                        };
                        var opt = {  
                            responsive: false,
                            //maintainAspectRatio: false,
                            title: { display: true, text: 'Contacts By Source' },  
                            legend: { display: false, position: 'bottom' },
                            animationSteps: 60,
                            animation: {
                                duration: 3000,
                            }
                        };
                        var myNewChart = new Chart(ctx, {  
                            type: 'doughnut',  
                            data: data,  
                            options: opt  
                        });
                } 
            }
        }
		//**********************************************************************
        //lets create donut chart for Opportunity By Sales Stage
        //**********************************************************************
       if (OpportunityBySalesStageArray != null && OpportunityBySalesStageArray.length > 0) {
            var len = OpportunityBySalesStageArray.length;
            for (var j = 0; j < len; j++) {
                var oneOSS = OpportunityBySalesStageArray[j];
                if (oneOSS) {
                    //get the canvas using the group id
                        var ctx = document.getElementById("OpportunityBySalesStageCanvas_"+oneOSS.GroupId).getContext("2d");
                        var labels = [];
                        var datas = [];
                        var coloR = [];
                        for (var i = 0; i < oneOSS.OpportunityBySalesStageData.length; i++) {
                            labels.push(oneOSS.OpportunityBySalesStageData[i].Name);
                            datas.push(oneOSS.OpportunityBySalesStageData[i].Total);
                            coloR.push(CEODashboard.dynamicColors());
                        }
                        data = {
                            datasets: [{
                                data: datas,
                                fill: false,
                                backgroundColor: coloR,
                                borderWidth: 1 
                            }],
                            labels: labels
                        };
                        var opt = {  
                            responsive: false,
                            //maintainAspectRatio: false,
                            title: { display: true, text: 'Opportunity By Sales Stage' },  
                            legend: { display: false, position: 'bottom' },
                            animationSteps: 60,
                            animation: {
                                duration: 3000,
                            }
                        };
                        var myNewChart = new Chart(ctx, {  
                            type: 'doughnut',  
                            data: data,  
                            options: opt  
                        });
                } 
            }
        }
		
		//**********************************************************************
        //lets create donut chart for Application By Status
        //**********************************************************************
       if (ApplicationByStatusArray != null && ApplicationByStatusArray.length > 0) {
            var len = ApplicationByStatusArray.length;
            for (var j = 0; j < len; j++) {
                var oneAppStatus = ApplicationByStatusArray[j];
                if (oneAppStatus) {
                    //get the canvas using the group id
                        var ctx = document.getElementById("ApplicationByStatusCanvas_"+oneAppStatus.GroupId).getContext("2d");
                        var labels = [];
                        var datas = [];
                        var coloR = [];
                        for (var i = 0; i < oneAppStatus.ApplicationByStatusData.length; i++) {
                            labels.push(oneAppStatus.ApplicationByStatusData[i].Name);
                            datas.push(oneAppStatus.ApplicationByStatusData[i].Total);
                            coloR.push(CEODashboard.dynamicColors());
                        }
                        data = {
                            datasets: [{
                                data: datas,
                                fill: false,
                                backgroundColor: coloR,
                                borderWidth: 1 
                            }],
                            labels: labels
                        };
                        var opt = {  
                            responsive: false,
                            //maintainAspectRatio: false,
                            title: { display: true, text: 'Application By Status' },  
                            legend: { display: false, position: 'bottom' },
                            animationSteps: 60,
                            animation: {
                                duration: 3000,
                            }
                        };
                        var myNewChart = new Chart(ctx, {  
                            type: 'doughnut',  
                            data: data,  
                            options: opt  
                        });
                } 
            }
        }
		
		
		
    },

    dynamicColors: function () {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        return "rgb(" + r + "," + g + "," + b + ")";
    },
	getCEODashboardData: function (days,group_id) {
        if(days == '')
			days = 7;
		$.ajax({
			url: 'index.php?module=home&action=getDashBoardData',
			type: 'POST',
			contentType: 'application/x-www-form-urlencoded',
			dataType: 'text',
			data: 'sugar_body_only=1&function=getCEODashboardData&days='+days+'&group_id='+group_id,						
			// data: 'sugar_body_only=1&function=getCEODashboardData&days='+days,						
			async: true,
			
			success : function (result){
				var obj = $.parseJSON(result);
				// console.log(obj);
				var data = []; 
				data.GroupsData = [];
				/* $(".canvas_container").each(function( i ) {
					$(this).html('');
				}); */
				for (key in obj){
					
				  // if(obj[key]['isparentgroup'] == 1 ){	
					$('#lead_created_'+key).text(obj[key]['LeadsCreatedCount']);
					$('#active_leads_'+key).text(obj[key]['LeadsActiveCount']);
					$('#converted_leads_'+key).text(obj[key]['LeadsConvertedCount']);
					$('#opportunity_created_'+key).text(obj[key]['OpportunitiesCreatedCount']);
					$('#active_opportunities_'+key).text(obj[key]['ActiveOpportunityCount']);
					$('#admission_applied_'+key).text(obj[key]['AdmissionAppliedCount']);
					$('#task_created_'+key).text(obj[key]['TasksCreatedCount']);
					$('#task_completed_'+key).text(obj[key]['TasksCompletedCount']);
					$('#task_completed_intime_'+key).text(obj[key]['TasksCompletedInTimeCount']);
					$('#task_completed_late_'+key).text(obj[key]['TasksCompletedLateCount']);
					$('#active_contacts_'+key).text(obj[key]['ContactsActiveCount']);
					$('#open_task_'+key).text(obj[key]['OpenTasksCount']);
					
					
					data.GroupsData.push({
						GroupId: obj[key]['groupid'] ,
						LeadsBySource: obj[key]['LeadsBySource']!= null? obj[key]['LeadsBySource'] :'|0',
						LeadsByStatus: obj[key]['LeadsByStatus']!= null? obj[key]['LeadsByStatus'] :'|0',
						ContactsByStage:  obj[key]['ContactsByStage']!= null? obj[key]['ContactsByStage'] :'|0',
						ContactsBySource: obj[key]['ContactsBySource']!= null? obj[key]['ContactsBySource'] :'|0',
						OpportunityBySalesStage: obj[key]['OpportunityBySalesStage']!= null? obj[key]['OpportunityBySalesStage'] :'|0',
						ApplicationByStatus: obj[key]['ApplicationByStatus']!= null? obj[key]['ApplicationByStatus'] :'|0'
					});
					
					/* Reset Exist graph canvas */
					var graphsDivs = ['leadsBySource','leadsByStatus','ContactsByStage','ContactsBySource','OpportunityBySalesStage','ApplicationByStatus'];
					grp_id = obj[key]['groupid'];
					for(i=0;i<graphsDivs.length;i++){
						canv = '<canvas id="' + graphsDivs[i] + 'Canvas_' + grp_id+'" style="padding: 0;margin: auto;"> </canvas>';
						$('#'+graphsDivs[i]+'_'+grp_id).html(canv);
					}
				  // }	
				}
				
				// console.log(data);
				CEODashboard.setupDataForLeads(data);
				CEODashboard.composeLeadCharts();

			}	
		});
		
    },
	
}
function updateDashboard(days,group_id){
	CEODashboard.getCEODashboardData(days,group_id);
}
function updateFinanceDashboard(months){
	if(months == ''){
		months = 3;
	}
	$.ajax({
		url: 'index.php?module=home&action=getDashBoardData',
		type: 'POST',
		contentType: 'application/x-www-form-urlencoded',
		dataType: 'text',
		data: 'sugar_body_only=1&function=getDashboardFinanceData&months='+months,						
		async: false,
		
		success : function (result){
			var obj = $.parseJSON(result);
			// console.log(obj);
			for (key in obj){
				var revenue = obj[key]!= null? obj[key] : '0.00';			  	
				$('#'+key).text('US$ '+ revenue);			  	
			}

		}	
	});
}
function updateFinanceDashlet(months,type){
	if(months == ''){
		months = 3;
	}
	/*  type = parent/branch/All/''  */	
	if(type == null || type ==''){
		type = 'All'
	}
	$.ajax({
		url: 'index.php?module=home&action=getDashBoardData',
		type: 'POST',
		contentType: 'application/x-www-form-urlencoded',
		dataType: 'text',
		data: 'sugar_body_only=1&function=getFinanceDashletData&months='+months+'&type='+type,						
		async: false,
		
		success : function (result){
			var obj = $.parseJSON(result);
			for (key in obj){
				//Revenue from Admission Applied
				var rev_a = 'AdmissionAppliedExpectedRevenue';
				var revenue_a = obj[key][rev_a]!= null? obj[key][rev_a] : '0.00';			  	
				$('#'+rev_a+'_'+key).text('US$ '+ revenue_a);
				// Revenue from opportunity commanced
				var rev_c = 'CommencedExpectedRevenue';
				var revenue_c = obj[key][rev_c]!= null? obj[key][rev_c] : '0.00';			  	
				$('#'+rev_c+'_'+key).text('US$ '+ revenue_c);					
			}

		}	
	});
}