var otp;
var email;

function Add_OTP_div() {
    email = document.getElementById('M2_email_inp').value;
    var data = {
      'email' : email
    };
    $.get("sendOTP", data, function(data){
      if(data.msg) {
        $.notify("User does not exist", "error");
      } else {
          otp = data.otp;
          document.getElementById('GiveOTP').style.display="block";
      }
    });
  }

function Remove_OTP_div() {
    var input = document.getElementById('M2_EnterOTP_inp').value;
    if(input === String(otp)) {
      $.notify("OTP match has been done successfully", "success");
      $("#Modal3").modal('show');
      document.getElementById('GiveOTP').style.display="none";

    } else {
      $.notify("OTP does not match", "warn");
    }
    
}

function submitNewPass() {
  $("#Modal2").modal('hide');
  var newPass = document.getElementById('M3_NewPassword_inp').value;
  var confirmPass = document.getElementById('M3_ConfirmPassword_inp').value;
  var data = {
    'email'       : email,
    'newPass'     : newPass,
    'confirmPass' : confirmPass
  };
  console.log(data);
  $.get("confirmPass", data, function(data){
    if(data.error) {
      $.notify(data.error, "error");
    }
    $.notify(data.msg, "success");
    $("#Modal3").modal('hide');
    $("#Modal1").modal('show');
  });
}

function updateTable(data) {
  var html="";
  console.log(data.data);
  document.getElementById('result').innerHTML = "";
  for(let i=0; i<data.length; i++) {
    if(data[i].status === 2) {
      html='<tr><td class="C_Task"><textarea class="task" placeholder="'+ data[i].task +'" disabled></textarea></td><td class="C_Status"><span class="badge rounded-pill bg-warning badge_size">Pending</span></td><td class="C_Action"><button id="D_Add_task_btn" type="button" onclick="updateStatus(' + data[i].id + ')" id="b1" class="btn btn-warning Done_button">Done</button></td>';
    } else {
      html='<tr><td class="C_Task"><textarea class="task" placeholder="'+ data[i].task +'" disabled></textarea></td><td class="C_Status"><span class="badge rounded-pill bg-success badge_size">Completed</span></td><td class="C_Update"></td>';
    }
    html += '<td class="C_Delete"><button id="D_Delete_task_btn" type="button" onclick="deleteTask(' + data[i].id + ')" id="b1" class="btn btn-danger Done_button">Delete</button></td></tr>';
    document.getElementById('result').innerHTML+=html;
  }
}

function addTask() {
  data = {
    'task' : document.getElementById('M6_Task_inp').value
  };
  $.get("addTask", data, function(data){
    if(data.error) {
      $.notify(data.error, "error");
    } else {
      $.notify(data.msg, "success");
      $("#Modal6").modal('hide');
      updateTable(data.data);
    }
  });
}

function updateStatus(id) {
  data = {
    'id' : id
  };
  $.get("updateStatus", data, function(data){
    if(data.error) {
      $.notify(data.error, "error");
    }
    $.notify(data.msg, "success");
    updateTable(data.data);
  });
}

function deleteTask(id) {
  data = {
    'id' : id
  };
  $.get("deleteTask", data, function(data){
    if(data.error) {
      $.notify(data.error, "error");
    }
    $.notify(data.msg, "success");
    updateTable(data.data);
  });
}

    