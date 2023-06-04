$(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over forms and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated');
                ajaxSubmit(form);

            }, false)
        })


    // Initialize city filter
    tableFilterInit('#users-table-index', 2, '#users-table-filter-index');

    /**
     * Initialize table filter
     * @param {string} tableSelector jQuery unique selector
     * @param {int} columnIndex  Index of column to apply filter (starting with 0)
     * @param {string} selectSelector  jQuery unique selector
     */
    function tableFilterInit(tableSelector, columnIndex, selectSelector) {

        var uniqueValues = [];
        var selectNode = $(selectSelector);

        // Reset table When running repeatedly
        $(tableSelector).find('tbody').find('tr').removeClass("d-none");
        selectNode.html('').append('<option value="0">Show all</option>');

        // For each row
        $(tableSelector).find('tbody').find('tr').each(function(i, e) {
            var itemValue = $(e).find('td:nth('+columnIndex+')').text();
            var option = uniqueValues.indexOf(itemValue);
            if(option < 0){
                option = uniqueValues.push(itemValue);
                selectNode.append('<option value="'+option+'">'+itemValue+'</option>');
            }else{
                option ++;
            }
            $(e).addClass('x-table-filter-'+columnIndex+'-'+option);
        });

        selectNode.on("change", function () {
            var option = parseInt(selectNode.val());
            if(option){
                $(tableSelector).find('tbody').find('tr').addClass("d-none");
                $(tableSelector).find('tbody').find('tr.x-table-filter-'+columnIndex+'-'+option).removeClass("d-none");
            }else{
                $(tableSelector).find('tbody').find('tr').removeClass("d-none");
            }
        })
    }

    
    /**
     * Insert notifiation in inserting form
     * @param {Boolean} success 
     * @param {String} text 
     */
    function insertFormNotice(success, text){
        $(
            '<div class="alert alert-'+(success? 'success' : 'danger')+' alert-dismissible" role="alert">\n'
            + '    <span>'+text+'</span>\n'
            + '    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\n'
            + '</div>\n'
        ).insertBefore('#add-user-index');
    }

    /**
     * Submit form via ajax
     * @param {HTMLElement} form 
     */
    function ajaxSubmit(form) {
        var data = $(form).serializeArray();
        $.post('create.php', data, function(response){
            if(response.ok){
                $("#users-table-index tbody").append('<tr>'+response.row+'</tr>');
                tableFilterInit('#users-table-index', 2, '#users-table-filter-index');
            }
            insertFormNotice(response.ok, response.message);
        }, "json");
    }


});

