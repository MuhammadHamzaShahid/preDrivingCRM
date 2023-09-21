function updateBMDashboardForCounselors(days){
	if(days == ''){
		days = 30;
	}
	$.ajax({
		url: 'index.php?module=home&action=getDashBoardData',
		type: 'POST',
		contentType: 'application/x-www-form-urlencoded',
		dataType: 'text',
		data: 'sugar_body_only=1&function=updateBMDashboardForCounselors&days='+days,
		async: false,
		success : function (result){
            $('#con_stats').find("tr:gt(0)").remove();
			var obj = $.parseJSON(result);
			for (key in obj){
                var tbl = document.getElementById("con_stats");
                var tblRow = document.createElement("tr");

                var tblCell0 = document.createElement("td");
                tblCell0.innerHTML = obj[key][0];
                tblRow.appendChild(tblCell0);

                var tblCell1 = document.createElement("td");
                tblCell1.innerHTML = obj[key][2];
                tblRow.appendChild(tblCell1);

                var tblCell2 = document.createElement("td");
                tblCell2.innerHTML = obj[key][3];
                tblRow.appendChild(tblCell2);

                var tblCell3= document.createElement("td");
                tblCell3.innerHTML = obj[key][4];
                tblRow.appendChild(tblCell3);

                tbl.appendChild(tblRow);
			}
		}	
	});
}
function updateBMDashboardForAdmOfficer(days){
	if(days == ''){
		days = 30;
	}
	$.ajax({
		url: 'index.php?module=home&action=getDashBoardData',
		type: 'POST',
		contentType: 'application/x-www-form-urlencoded',
		dataType: 'text',
		data: 'sugar_body_only=1&function=updateBMDashboardForAdmOfficer&days='+days,
		async: false,
		success : function (result){
            $('#admoff_stats').find("tr:gt(0)").remove();
			var obj = $.parseJSON(result);
			for (key in obj){
                var tbl = document.getElementById("admoff_stats");
                var tblRow = document.createElement("tr");

                var tblCell0 = document.createElement("td");
                tblCell0.innerHTML = obj[key][0];
                tblRow.appendChild(tblCell0);

                var tblCell1 = document.createElement("td");
                tblCell1.innerHTML = obj[key][2];
                tblRow.appendChild(tblCell1);

                var tblCell2 = document.createElement("td");
                tblCell2.innerHTML = obj[key][3];
                tblRow.appendChild(tblCell2);

                var tblCell3= document.createElement("td");
                tblCell3.innerHTML = obj[key][4];
                tblRow.appendChild(tblCell3);

                var tblCell4= document.createElement("td");
                tblCell4.innerHTML = obj[key][5];
                tblRow.appendChild(tblCell4);

                tbl.appendChild(tblRow);
			}
		}
	});
}