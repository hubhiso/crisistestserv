function vali_case() {

    var sender_case = document.forms["RegForm"]["sender_case"].value;
    var sender = document.forms["RegForm"]["sender"];
    var agent_tel = document.forms["RegForm"]["agent_tel"];

    var name = document.forms["RegForm"]["name"];
    var victim_tel = document.forms["RegForm"]["victim_tel"];

    var prov_id = document.forms["RegForm"]["prov_id"];

    var problem_case = document.forms["RegForm"]["problem_case"];

    if (sender_case == "2") {

        if (sender.value == "") {
            window.alert("กรุณาบันทึกชื่อหรือนามแฝง ของผู้แจ้งแทน");
            sender.focus();
            return false;
        }

        if (agent_tel.value == "") {
            window.alert("กรุณาบันทึกหมายเลขโทรศัพท์ ของผู้แจ้งแทน");
            agent_tel.focus();
            return false;
        }
        if (isNaN(agent_tel.value)) {
            window.alert("กรุณาบันทึกเป็นหมายเลข");
            agent_tel.focus();
            return false;
        }

        if (agent_tel.value.length <= 8) {
            window.alert("กรุณาบันทึกเป็นหมายเลข 9 - 10 หลัก");
            agent_tel.focus();
            return false;
        }

        if (name.value == "") {
            window.alert("กรุณาบันทึกชื่อหรือนามแฝง");
            name.focus();
            return false;
        }

    } else if (sender_case == "1") {

        if (name.value == "") {
            window.alert("กรุณาบันทึกชื่อหรือนามแฝง");
            name.focus();
            return false;
        }

        if (victim_tel.value == "") {
            window.alert("กรุณาบันทึกหมายเลขโทรศัพท์");
            victim_tel.focus();
            return false;
        }
        if (isNaN(victim_tel.value)) {
            window.alert("กรุณาบันทึกเป็นหมายเลข");
            victim_tel.focus();
            return false;
        }

        if (victim_tel.value.length <= 8) {
            window.alert("กรุณาบันทึกเป็นหมายเลข 9 - 10 หลัก");
            victim_tel.focus();
            return false;
        }
    }


    if (prov_id.selectedIndex < 1) {
        window.alert("กรุณาบันทึกจังหวัดที่เกิดเหตุ");
        prov_id.focus();
        return false;
    }

    if (problem_case.selectedIndex < 1) {
        window.alert("กรุณาบันทึกปัญหาที่พบ");
        problem_case.focus();
        return false;
    }


    $('#submitBtn').click();



    return false;
}