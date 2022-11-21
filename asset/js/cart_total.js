function chkcontrol(j) {
	var sum = 0;
	for (var i = 0; i < document.form1.ckb.length; i++) {
		if (document.form1.ckb[i].checked) {
			sum = sum + parseInt(document.form1.ckb[i].value);
		}
		document.getElementById("cartTotal").innerHTML = sum.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}
}

// $(function () {
// 	$("#tst").click(function () {
// 		var selected = new Array();
// 		$("#form1 input[type=checkbox]:checked").each(function () {
// 			selected.push(this.value);
// 		});
// 		if (selected.length > 0) {
// 			alert("Selected values: " + selected.join(","));
// 		}
// 	});
// });