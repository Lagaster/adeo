$(".single-checkbox").click(function (event) {
    $("#select-all").prop("checked", false);
    let id = $(this).attr("id");
});

$("#select-all").click(function (e) {
    if ($(this).prop("checked")) {
        $(this).attr("checked", true);
        $(".single-checkbox").prop("checked", true);
    } else {
        $(this).attr("checked", false);
        $(".single-checkbox").prop("checked", false);
    }
});

$("#markAllSelectedAsRead").click(function (e) {
    e.preventDefault();
    let vm = this ;
    let icon = "<i class='fa fa-spinner fa-spin'></i>";
    $(this)
        .html(icon + " Marking as read...")
        .attr("disabled", true);
    let ids = [];
    $(".single-checkbox:checked").each(function () {
        ids.push($(this).attr("id"));
    });

    // check if there is any selected checkbox
    if (ids.length == 0) {
        new swal({
            title: "No message selected",
            text: "Please select at least one message to mark as read",
            icon: "warning",
            button: "Ok",
        });
        let icon = "<i class='fa fa-check'></i>";
        $("#markAllSelectedAsRead")
            .html(icon + " Mark all as read")
            .attr("disabled", false);

        return false;
    }

    new swal({
        title: "Are you sure?",
        text: "You are about to mark all selected messages as read",
        icon: "warning",
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, mark as read!",
        showCancelButton: true,
        focusConfirm: false,
    }).then((result) => {
        if(result.isConfirmed)
        {
            markAsRead(ids);
        }
        
    }      
    ).finally(() => {
        let icon = "<i class='fa fa-check'></i>";
        $(vm)
            .html(icon + " Mark all as read")
            .attr("disabled", false);
    });
   
});


$("#deleteAllSelectedData").click(function (e) {
    e.preventDefault();
    let vm = this ;
    let icon = "<i class='fa fa-spinner fa-spin'></i>";
    $(this)
        .html(icon + " Marking as read...")
        .attr("disabled", true);
    let ids = [];
    $(".single-checkbox:checked").each(function () {
        ids.push( parseInt($(this).attr("id")) );
    });

    // check if there is any selected checkbox
    if (ids.length == 0) {
        new swal({
            title: "No message selected",
            text: "Please select at least one message to mark as read",
            icon: "warning",
            button: "Ok",
        });
        let icon = "<i class='fa fa-check'></i>";
        $(this)
            .html(icon + " Mark all as read")
            .attr("disabled", false);

        return false;
    }

    new swal({
        title: "Are you sure?",
        text: "You are about to mark all selected messages as read",
        icon: "warning",
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, mark as read!",
        showCancelButton: true,
        focusConfirm: false,
    }).then((result) => {
        if(result.isConfirmed)
        {
         
            deleteSelected(ids);
        }
        
    }      
    ).finally(() => {
        let icon = "<i class='fa fa-check'></i>";
        $(vm)
            .html(icon + " Mark all as read")
            .attr("disabled", false);
    });
   
});



function markAsRead(ids) {
     

    window.axios
        .post("/admin/messages/mark-all-as-read", {
            contacts: ids,
        })
        .then((result) => {
            if (result.data.status == "success") {
                new swal({
                    title: "Success",
                    text: result.data.message,
                    icon: "success",
                    button: "Ok",
                });
                location.reload();
            } else {
                new swal({
                    title: "Error",
                    text: "Something went wrong, please try again later",
                    icon: "error",
                    button: "Ok",
                });
            }
        })
        .catch((err) => {
            new swal({
                title: "Error",
                text: "Something went wrong, please try again later",
                icon: "error",
                button: "Ok",
            });
        });
        
}


function deleteSelected(ids) {
     

    window.axios
        .post("/admin/messages/delete", {
            contacts: ids,
        })
        .then((result) => {
            if (result.data.status == "success") {
                new swal({
                    title: "Success",
                    text: result.data.message,
                    icon: "success",
                    button: "Ok",
                });
                location.reload();
            } else {
                new swal({
                    title: "Error",
                    text: "Something went wrong, please try again later",
                    icon: "error",
                    button: "Ok",
                });
            }
        })
        .catch((err) => {
            new swal({
                title: "Error",
                text: "Something went wrong, please try again later",
                icon: "error",
                button: "Ok",
            });
        })
        
}
