const subscriber = () => {
//edit user via modal
    $(".editBtn").each(function () {
        $(this).on('click', (e) => {
            $('#addFormInfo').empty();
            const data = e.target.dataset;
            $('.form-accept-btn').attr('data-link',
                `api/addUser.php?id=${data.id}`
            )
            $('.main-form-modal').text(data.text)
            $('form input[name="first"]').val(data.first)
            $('form input[name="second"]').val(data.second)
            $('form input[name="status"]').attr('checked', data.status === "on")
            $('form select[name="role"]').val(data.role)
        })
    });

//accept form for add and edit mode
    $('.form-accept-btn').on('click',function () {
        let data = {};
        $('.modal-form').find('input, input, input, select').each(function () {
            if(this.name === 'status') {
                data[this.name] = $(this).prop('checked') ? "on" : "off"
            }
            else
            data[this.name] = $(this).val()
        })
        if(data.first.length === 0 || data.second.length === 0)
        {
            $('#addFormInfo').text('you have empty field')
        }
        else if(data.first.length >= 15 || data.second.length >= 15){
            $('#addFormInfo').text('your field have more than 20 symbols');
        }else if(data.role === 'null'){
            $('#addFormInfo').text('choose your role');
        }else
        {
            $('#exampleModal').modal('hide')
            $.ajax({
                type: "POST",
                url: $(this).attr('data-link'),
                data: data,
                success: (res) => {
                    outputAllUser();
                }
            })
        }
    })


//get path for add new user php script
    $(".addBtn").each(function () {
        $(this).on('click', (e) => {
            $('.form-accept-btn').attr('data-link',
                `api/addUser.php`
            )
            $('.main-form-modal').text(e.target.dataset.text)
            $('form input[name="first"]').val('')
            $('form input[name="second"]').val('')
            $('form input[name="status"]').attr('checked', false)
            $('form select[name="role"]').val('null')
        })
    })
//modal accept
    $('#acceptModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget)
        const info = button.data('info')
        const link = button.data('link')
        let modal = $(this)
        modal.find('.modal-title').text(info)
        modal.find('.delete-button').click(() => {
            $.ajax(link, {
                success: function (data) {
                }
            })
            button.parent().parent().parent().remove();
        })
    })
//make checkbox checked all
    $('.mainCheck').on('change', event => {
        $('.checkerBox').prop('checked', event.target.checked)
    })
//change for single checkbox
    $('.checkerBox').each(function () {
        $(this).on('change', e => {
            if (!$(this).prop('checked')) {
                $('.mainCheck').prop('checked', false)
            } else {
                let check = true;
                $('.checkerBox').each(function () {
                    if ($(this).prop('checked') === false) {
                        check = false;
                        return;
                    }
                })
                $('.mainCheck').prop('checked', check);
            }
        })
    })
//select tags to button ok
    $('.select-header').each(function () {
        $(this).on('change', e => {
            $('.select-header').each(function () {
                $(this).val(e.target.value);
                $('.okBtn').each(function () {
                    $(this).data['accept'] = e.target.value
                })
            })
        })
    })

//take mass of selected checkboxes
    function getIdMass() {
        let mass = [];
        $('.checkerBox').each(function () {
            if ($(this).prop('checked')) {
                mass.push($(this).attr('data-id'));
            }
        })
        return mass;
    }
//button multiply select ok
    $('.okBtn').each(function () {
        $(this).on('click', e => {
            const type = $(this).data['accept'];
            if (type === 'null' || type === undefined) {
                $('.info-ok-button').text('not selected menu')
            } else {
                const massToChange = getIdMass();
                if (massToChange.length === 0)
                    $('.info-ok-button').text('not selected users')
                else {

                    $.ajax({
                        type: "POST",
                        url: "api/multiChange.php",
                        data: {
                            type: type,
                            mass: massToChange
                        },
                        success: (res) => {
                            $('.checkerBox').each(function () {
                                massToChange.forEach(id => {
                                    if (id === $(this).attr('data-id')) {
                                        switch (type) {
                                            case "active":
                                                console.log();
                                                $(this).parent().parent().children('.status').children('.statusDiv').removeClass('notActiveStatus')
                                                $(this).parent().parent().children('.status').children('.statusDiv').addClass('activeStatus')
                                                break;
                                            case "not-active":
                                                $(this).parent().parent().children('.status').children('.statusDiv').removeClass('activeStatus')
                                                $(this).parent().parent().children('.status').children('.statusDiv').addClass('notActiveStatus')
                                                break;
                                            case "delete":
                                                $(this).parent().parent().parent().remove();
                                                break;
                                        }
                                    }
                                })
                            })
                        },
                    });
                }
            }
        })
    })
}

//user maker
const templateUser = (id, first, second, status, role) => {
    $('#output-list').append(` <li class="ticket-item">
        <div class="row">
            <div class="ticket-time  col-md-1 col-sm-1 col-xs-1">
                <input data-id="${id}" class="checkerBox" type="checkbox">
            </div>
            <div class="ticket-user col-md-4 col-sm-4 col-xs-6">
                <span class="divider hidden-xs"></span>
                <span class="user-name">${first}</span>
                <span class="user-name">${second}</span>
            </div>
            <div class="ticket-time status col-md-2 col-sm-2 col-xs-2">
                <div class="divider hidden-md hidden-sm hidden-xs"></div>
                <div class="statusDiv ${status === 'on' ? 'activeStatus' : 'notActiveStatus'} "></div>
            </div>
            <div class="ticket-time  col-md-2 col-sm-2 col-xs-2">
                <div class="divider hidden-md hidden-sm hidden-xs"></div>
                <span>${role}</span>
            </div>
            <div class="ticket-time  col-md-3 col-sm-3 col-xs-12">
                <span class="divider hidden-xs"></span>

                <button data-id="${id}"
                        data-first="${first}"
                        data-second="${second}"
                        data-status="${status}"
                        data-role="${role}"
                        data-text="Edit User"
                        data-toggle="modal"
                        data-target="#exampleModal" type="button" class="editBtn btn btn-warning btn-sm">
                    Edit
                </button>
                <button type="button"
                        data-link="api/delete.php?id=${id}"
                        data-target="#acceptModal"
                        data-info="Delete user ${first}"
                        data-toggle="modal"
                        class="deleteBtn btn btn-danger btn-sm">Delete
                </button>
            </div>`)
}
//show all users from db
outputAllUser = () => {
    $.ajax({
        type: "GET",
        url: "api/getUsers.php",
        success: (res) => {
            $('#output-list').empty()
            let data = JSON.parse(res);
            data.data.forEach((user) => {
                templateUser(user.id, user.first, user.second, user.status, user.role);
            })
            console.log("update");
            subscriber();
        }
    })


}

outputAllUser();



















