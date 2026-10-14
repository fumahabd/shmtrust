function formatDoc(cmd, value = null) {
    if (value) {
        document.execCommand(cmd, false, value);
    } else {
        document.execCommand(cmd);
    }
}
function addLink() {
    var url = prompt('Insert url');
    if (url) {
        $('#textbody').focus();
        formatDoc('createLink', url);
    }
}
function sanitizeTextTag(body) {
    body = body.replace(/&lt;/g, '<').replace(/&gt;/g, '>');
    body = body.replace(/&nbsp;/g, '');
    body = body.replace(/<span[^>]*style="[^"]*"[^>]*>(.*?)<\/span>/gi, '');
    body = body.replace(/style="[^"]*"/gi, '');
    body = body.replace(/<div>/g, '').replace(/<\/div>/g, ' ');
    body = body.replace(/<script[^>]*>/gi, '<div class="code">');
    body = body.replace(/<\/script>/gi, '</div>');
    body = body.replace(/<\?php/gi, '<div class="code">');
    body = body.replace(/\?>/gi, '</div>');
    return body;
}
function addButton(id, title, icon='') {
    let button = `<a class="d-flex align-items-center text-secondary cursor-pointer border border-1 border-secondary p-2 bg-primary bg-grey-400-hover" id="${id}" data-bs-toggle="modal" data-bs-target="#staticmodal">`;
    if(icon){
        button +=`<i class="${icon}-icon icon-bg-grey" style="zoom:1.5"></i>`
    }
    button +=`<span class="ps-2">${title}</span> </a>`;
     return button;
}
function updateInputField() {
    const input = $('#choosepostimage')[0];
    const dataTransfer = new DataTransfer();
    selectedFiles.forEach(file => {
        dataTransfer.items.add(file);
    });
    input.files = dataTransfer.files;
}
function imageProcess(images, formData) {
    const promises = [];
    Array.from(images).forEach(function (imgElement, index) {
        const canvasWidth = 400;
        const canvasHeight = 400;
        promises.push(new Promise((resolve, reject) => {
            const img = new Image();
            img.onload = function () {
                const canvas = document.createElement('canvas');
                canvas.width = canvasWidth
                canvas.height = canvasHeight
                const ctx = canvas.getContext('2d');
                ctx.drawImage(img, 0, 0);
                ctx.fillRect(0, 0, canvasWidth, canvasHeight);
                let width = img.width;
                let height = img.height;
                let scaleFactor;
                if (width / height > canvasWidth / canvasHeight) {
                    scaleFactor = canvasWidth / width;
                } else {
                    scaleFactor = canvasHeight / height;
                }
                width *= scaleFactor;
                height *= scaleFactor;
                const x = (canvasWidth - width) / 2;
                const y = (canvasHeight - height) / 2;

                ctx.drawImage(img, x, y, width, height);

                canvas.toBlob((blob) => {
                    if (blob) {
                        console.log(blob);
                        const fileName = `image${index + 1}.jpg`;
                        formData.append('images[]', blob, fileName);
                        resolve();
                    } else {
                        reject(new Error('Blob conversion failed'));
                    }
                }, 'image/jpeg', 0.7);
            }
            img.onerror = function () {
                reject(new Error('Image loading failed'));
            };
            img.src = $(imgElement).attr('src');
        }));
    })
    return Promise.all(promises);
}
function saveFormData(formData, url) {
    $.ajax({
        url: url,
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (res) {
            if (res.success) {
                $('#staticmodal').modal('hide');
                $('.toaster').html(anySuccess(res.message));
                const d = res.data;
                let tr = `<tr data-id="${d.art_id}" key="0">
                <td>0</td>
                <td>${d.name}</td>
                <td>
                    <div>
                        <img src="../storage/arts/${d.image}" alt="" width="80px" height="60px">
                    </div>
                </td>
                  <td class="">`
                if (Array.isArray(d.users)) {
                    d.users.forEach(user => {
                        tr += `<a class="class="bg-dark text-white mx-1 fs-8px"">${user.first_name} ${user.last_name}</a>`;
                    });
                }
                tr += `</td>
                <td>${d.price + ' ' + d.currency} </td>
                <td>
                    <div class="d-flex gap-1 align-items-center justify-content-center">
                     <a class="copy-arts btn btn-sm bg-success text-white"
                            data-bs-toggle="modal" data-bs-target="#staticmodal">Copy</a>
                        <a class="edit-arts btn btn-sm bg-primary text-white text-nowrap"
                            data-bs-toggle="modal" data-bs-target="#staticmodal">Full Edit</a>
                        <a class="delete-arts btn btn-sm bg-danger">Delete</a>
                    </div>
                </td>
                <td>${d.cr_at}</td>
            </tr>`;
                $('#main-table tbody').prepend(tr);
            }
        },
        error: function (xhr) {
            console.log(xhr);
        }
    })
}
let dragSrcEl = null;

window.services = [];
function fetchServices(page = 1, limit = 50) {
    return $.ajax({
        url: 'load-services-paginate',
        method: 'GET',
        data: { page, limit },
    });
}
function loadServicesPaginate(page = 1) {
    fetchServices(page).then(res => {
        if (res.success && res.data.length) {
            services = res.data; // Update the global artists array
            renderServicesTable(services);
        }
    }).catch(err => {
        console.error('Failed to fetch services', err);
    });
}
function renderServicesTable(data) {
    $('#main-table thead').html('');
    $('#main-table tbody').html('');

    const tableHead = `<tr><th>#</th>
    <th>Title</th>
    <th>Icon</th>
    <th>TextBody</th>
    <th>Action</th>
    <th>Create At</th></tr>`;
    $('#main-table thead').html(tableHead);
    const total = data.length;
    data.forEach((d, k) => {
        renderServicesRow(d, k + 1);
    });
    $('#total-row').text(total);
}
function renderServicesRow(service, index) {
    let tr = `<tr data-id="${service.id}" data-sl="${service.sl}" key="${service.id}" draggable="true" ondragstart="onDragStart(event)" ondragover="onDragOver(event)" ondrop="onDrop(event)">
    <td>${service.sl}</td>
    <td>${service.title}</td>
    <td>
        <div>
            <i style="display: inline-block; width: 40px; height: 40px;  mask: url(../${service.icon}) no-repeat center;  -webkit-mask: url(../${service.icon}) no-repeat center; background-color:grey;"></i>
        </div>
    </td>
    <td>
       ${service.text.length > 30 ? service.text.substring(0, 30) + '...' : service.text}
    </td>
    <td>
        <div class="d-flex gap-1 align-items-center justify-content-center">`;
         if(Number(service.status) === 1){
            tr+=`<a class="change-service-status btn btn-sm bg-warning text-white" id="change-service-status">Deactivate</a>`
         }else{
           tr+= `<a class="change-service-status btn btn-sm bg-success text-white" id="change-service-status">Activate</a>`
         }
       tr+= ` <a class="edit-service btn btn-sm bg-primary text-white text-nowrap" id="edit-service"
                data-bs-toggle="modal" data-bs-target="#staticmodal">Edit</a>
            <a class="delete-service btn btn-sm bg-danger">Delete</a>
        </div></td><td>${service.cr_at?service.cr_at:"now"}</td></tr>`;
    $('#main-table tbody').append(tr);
}
function addedOrUpdatedService(service) {
    // Find the index of the artist with the same user_id
    const index = services.findIndex(s => s.sl === Number(service.sl));

    if (index !== -1) {
        services[index] = service;
    } else {
        // If the artist is not found, add it to the beginning of the array
        services.unshift(service);
    }

    // Clear the current table body
    $('#main-table tbody').html('');

    // Re-render the table with the updated artists array
    services.forEach((service, index) => {
        renderServicesRow(service, index + 1);
    });
}
window.products = [];
function fetchProducts(page = 1, limit = 50) {
    return $.ajax({
        url: 'load-products-paginate',
        method: 'GET',
        data: { page, limit },
    });
}
function loadProductsPaginate(page = 1) {
    fetchProducts(page).then(res => {
        if (res.success && res.data.length) {
            products = res.data; // Update the global artists array
            renderProductsTable(products);
        }
    }).catch(err => {
        console.error('Failed to fetch services', err);
    });
}
function renderProductsTable(data) {
    $('#main-table thead').html('');
    $('#main-table tbody').html('');

    const tableHead = `<tr><th>#</th>
    <th>Title</th>
    <th>Image</th>
    <th>SubTitle</th>
    <th>Action</th>
    <th>Create At</th></tr>`;
    $('#main-table thead').html(tableHead);
    const total =  data.length;
    data.forEach((d, k) => {
        renderProductsRow(d, k + 1);
    });
    $('#total-row').text(total);
}
function renderProductsRow(product, index) {
    let tr = `<tr data-id="${product.id}" data-sl="${product.sl}" key="${product.id}" draggable="true" ondragstart="onDragStart(event)" ondragover="onDragOver(event)" ondrop="onDrop(event)">
    <td>${product.sl}</td>
    <td>${product.title}</td>
    <td>
        <div>
            <img src="../${product.image}" alt="" width="80px" height="60px">
        </div>
    </td>
    <td>
       ${product.sub_title}
    </td>
    <td>
        <div class="d-flex gap-1 align-items-center justify-content-center">`;
         if(Number(product.status) === 1){
            tr+=`<a class="change-product-status btn btn-sm bg-warning text-white" id="change-product-status">Deactivate</a>`
         }else{
           tr+= `<a class="change-product-status btn btn-sm bg-success text-white" id="change-product-status">Activate</a>`
         }
       tr+= ` <a class="edit-product btn btn-sm bg-primary text-white text-nowrap" id="edit-product"
                data-bs-toggle="modal" data-bs-target="#staticmodal">Edit</a>
            <a class="delete-product btn btn-sm bg-danger">Delete</a>
        </div></td><td>${product.cr_at?product.cr_at:"now"}</td></tr>`;
    $('#main-table tbody').append(tr);
}
function addedOrUpdatedProduct(product) {
    // Find the index of the artist with the same user_id
    const index = products.findIndex(p => p.sl === Number(product.sl));

    if (index !== -1) {
        products[index] = product;
    } else {
        // If the artist is not found, add it to the beginning of the array
        products.unshift(product);
    }

    // Clear the current table body
    $('#main-table tbody').html('');

    // Re-render the table with the updated artists array
    products.forEach((product, index) => {
        renderProductsRow(product, index + 1);
    });
}
window.projects = [];
function fetchProjects(page = 1, limit = 50) {
    return $.ajax({
        url: 'load-projects-paginate',
        method: 'GET',
        data: { page, limit },
    });
}
function loadProjectsPaginate(page = 1) {
    fetchProjects(page).then(res => {
        if (res.success && res.data.length) {
            projects = res.data; // Update the global artists array
            renderProjectsTable(projects);
        }
    }).catch(err => {
        console.error('Failed to fetch services', err);
    });
}
function renderProjectsTable(data) {
    $('#main-table thead').html('');
    $('#main-table tbody').html('');

    const tableHead = `<tr><th class="d-flex align-items-center justify-content-between cursor-pointer"># <i class="sort-icon bg-secondary cursor-pointer" data-table="projects" data-order="asc" style="zoom:1.2" id="sort-by-sl"></i></th>
    <th>Title</th>
    <th>Image</th>
    <th>Text</th>
    <th class="d-flex align-items-center justify-content-between cursor-pointer">Status <i class="sort-icon bg-secondary cursor-pointer" data-table="projects" data-order="asc" style="zoom:1.2" id="sort-by-category"></i></th>
    <th>Action</th>
    <th>Create At</th></tr>`;
    $('#main-table thead').html(tableHead);
    const total =  data.length;
    let cat1 = 0;
    let cat2 = 0;
    data.forEach((d, k) => {
        if(d.category==='ongoing') cat1+=1;
        if(d.category==='completed') cat2+=1;
        renderProjectsRow(d, k + 1);
    });
$('#total-row').text(total);
$('#total-details').html(`Ongoing ${cat1}, Completed ${cat2}`)
}
function renderProjectsRow(project, index) {
    let tr = `<tr data-id="${project.id}" data-sl="${project.sl}" key="${project.id}" draggable="true" ondragstart="onDragStart(event)" ondragover="onDragOver(event)" ondrop="onDrop(event)">
    <td>${project.sl}</td>
    <td>${project.title}</td>
    <td>
        <div>
            <img src="../${project.image}" alt="" width="80px" height="60px">
        </div>
    </td>
    <td>
       ${project.text.length > 30 ? project.text.substring(0, 30) + '...' : project.text}
    </td>
    <td>`;
    if(project.category=== "ongoing"){
        tr+=`<a class="btn btn-sm bg-primary text-white" >Ongoing</a>`
     }else if(project.category ==='completed'){
       tr+= `<a class="btn btn-sm bg-success text-white">Completed</a>`
     }else{
        tr+= `<a class="btn btn-sm bg-info text-white">Proposed</a>`
     }
    tr+=`</td>
    <td>
        <div class="d-flex gap-1 align-items-center justify-content-center">`;
         if(Number(project.status) === 1){
            tr+=`<a class="change-project-status btn btn-sm bg-warning text-white" id="change-project-status">Deactivate</a>`
         }else{
           tr+= `<a class="change-project-status btn btn-sm bg-success text-white" id="change-project-status">Activate</a>`
         }
       tr+= ` <a class="edit-project btn btn-sm bg-primary text-white text-nowrap" id="edit-project"
                data-bs-toggle="modal" data-bs-target="#staticmodal">Edit</a>
            <a class="delete-project btn btn-sm bg-danger">Delete</a>
        </div></td><td>${project.cr_at?project.cr_at:"now"}</td></tr>`;
    $('#main-table tbody').append(tr);
}
function addedOrUpdatedProject(project) {
    // Find the index of the artist with the same user_id
    const index = projects.findIndex(p => p.sl === Number(project.sl));

    if (index !== -1) {
        projects[index] = project;
    } else {
        // If the artist is not found, add it to the beginning of the array
        projects.unshift(project);
    }

    // Clear the current table body
    $('#main-table tbody').html('');

    // Re-render the table with the updated artists array
    projects.forEach((project, index) => {
        renderProjectsRow(project, index + 1);
    });
}

let selectedFiles = [];
let current_clicked = '';
let sortState = {
    sl: 'asc',
    category: 'asc'
};
$(document).ready(function () {
    $('body').on('click', function (e) {
        if ($(e.target).closest('.userphotobtn').length) {
            $('.userdetails').toggleClass('d-block');
        }
        if(e.target.id==='sort-by-sl'){
            const sortOrder = sortState.sl;
            projects.sort((a, b) => {
                return sortOrder === 'asc' ? a.sl - b.sl : b.sl - a.sl;
            });
        
            // Toggle order for next click
            sortState.sl = sortOrder === 'asc' ? 'desc' : 'asc';
            renderProjectsTable(projects);
        }
        if (e.target.id === 'sort-by-category') {
            const sortOrder = sortState.category;
        
            projects.sort((a, b) => {
                return sortOrder === 'asc'
                    ? a.category.localeCompare(b.category)
                    : b.category.localeCompare(a.category);
            });
        
            sortState.category = sortOrder === 'asc' ? 'desc' : 'asc';
            renderProjectsTable(projects);
        }
        //services
        if ($(e.target).closest('.all-services-btn').length && current_clicked !=='all-services-btn') {
        current_clicked='all-services-btn';
            const heading = `<div class="d-flex gap-4 pb-3 px-3 align-items-center justify-content-end"><p class="mb-0">Total <span id="total-row"></span></p><span id="total-details"></span>
            <a class="text-secondary cursor-pointer border border-1 border-secondary p-2 bg-primary bg-grey-400-hover" id="new-service" data-bs-toggle="modal" data-bs-target="#staticmodal"><span class="ps-2">Add New Service</span></a></div>`;
            const mainTable = `<table class="services table table-bordered table-striped hover" data-array="services" id="main-table">
                        <thead> </thead>
                        <tbody> </tbody>
                    </table>`;
            $('.middlemenu').html(' ');
            $('.middlemenu').append(heading);
            $('.middlemenu').append(mainTable);
            loadServicesPaginate(1);
        }
        if (e.target.id === 'service-save-btn') {
            const barLoader = $(e.target).closest('.modal-content').find('.loader-wrapper');
            barLoader.removeClass('d-none');
            let formData = new FormData();
            let title = $('#title').val(), text = $('#text').val();
            if (title) {
                formData.append('title', title)
            } else {
                $('.toaster').html(anyError('Title is required !'));
                return 0;
            }
            if (text) {
                formData.append('text', text)
            } else {
                $('.toaster').html(anyError('Please give TextData !'));
                return 0;
            }
            const image = $('#previewBox img');
            if (image.length === 0) {
                $('.toaster').html(anyError('Icon required !'));
                return 0;
            }
            if (image.hasClass('previousImg')) {
                $('.toaster').html(anyError('Icon already Uploaded ! Please select another one.'));
                return 0;
            } else {
                const base64String = image[0].src.split(',')[1];
                const byteCharacters = atob(base64String);
                const byteNumbers = new Array(byteCharacters.length).fill().map((_, i) => byteCharacters.charCodeAt(i));
                const byteArray = new Uint8Array(byteNumbers);
                const blob = new Blob([byteArray], { type: 'image/svg+xml' });
                formData.append('icon', blob, 'icon.svg');
            }
            $.ajax({
                url: "store-service",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (res) {
                    if (res.success) {
                        $('#staticmodal').modal('hide');
                        $('.toaster').html(anySuccess(res.message));
                        addedOrUpdatedService(res.data);
                    }
                }
            });
        }
        if (e.target.id === 'service-update-btn') {
            const barLoader = $(e.target).closest('.modal-content').find('.loader-wrapper');
            barLoader.removeClass('d-none');
            let formData = new FormData();
            let serviceId = $('#service-update-btn').data('id'), title = $('#title').val(), text = $('#text').val();
            if (title) {
                formData.append('id', serviceId);
                formData.append('title', title);
            } else {
                $('.toaster').html(anyError('Title is required !'));
                return 0;
            }
            if (text) {
                formData.append('text', text)
            } else {
                $('.toaster').html(anyError('Please give TextData !'));
                return 0;
            }
            const image = $('#previewBox img');
            if (image.length === 0) {
                $('.toaster').html(anyError('Image required !'));
                return 0;
            }
            if (image.hasClass('previousImg')) {
                formData.append('previousImage', image[0].src);
            } else {
                const base64String = image[0].src.split(',')[1];
                const byteCharacters = atob(base64String);
                const byteNumbers = new Array(byteCharacters.length).fill().map((_, i) => byteCharacters.charCodeAt(i));
                const byteArray = new Uint8Array(byteNumbers);
                const blob = new Blob([byteArray], { type: 'image/svg+xml' });
                formData.append('icon', blob, 'icon.svg');
            }
            $.ajax({
                url: "update-service",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (res) {
                    if (res.success) {
                        $('#staticmodal').modal('hide');
                        $('.toaster').html(anySuccess(res.message));
                        addedOrUpdatedService(res.data);
                    }
                }
            });
        }
        if ($(e.target).closest('.delete-service').length) {
            const tr = $(e.target).closest('tr');
            const dataId = tr.data('id');
            if (confirm('Are you sure to Delete this?')) {
                $.ajax({
                    url: '/delete-service',
                    type: 'POST',
                    data: { id: dataId },
                    success: function (response) {
                        if (response.success) {
                            tr.remove();
                            services = services.filter(service => service.id !== dataId);
                            $('.toaster').html(anySuccess(response.message));
                        } else {
                            $('.toaster').html(anyError(response.message));
                        }
                    },
                    error: function () {
                        $('.toaster').html(anyError(response.message));
                    }
                });
            }
        }
        if ($(e.target).closest('.change-service-status').length) {
            const tr = $(e.target).closest('tr');
            const dataId = tr.data('id');
            const statusBtn = $(e.target).closest('.change-service-status');
            const currentService = services.find((s) => s.id === dataId);
            let status = 1;
            let statusText = "Deactivate";
            if(Number(currentService.status)===1){
                status = 0;
                statusText= 'Activate';
            }
            $.ajax({
                url: '/change-service-status',
                type: 'POST',
                data: { id: dataId, status },
                success: function (response) {
                    if (response.success) {
                        statusBtn.text(statusText);
                        currentService.status = status;
                        $('.toaster').html(anySuccess(response.message));
                    } else {
                        $('.toaster').html(anyError(response.message));
                    }
                },
                error: function () {
                    $('.toaster').html(anyError(response.message));
                }
            });
        }
        //products
        if ($(e.target).closest('.all-products-btn').length && current_clicked !=='all-products-btn') {
            current_clicked='all-products-btn';
            const heading = `<div class="d-flex gap-4 pb-3 px-3 align-items-center justify-content-end"><p class="mb-0">Total <span id="total-row"></span></p><span id="total-details"></span>
            <a class="text-secondary cursor-pointer border border-1 border-secondary p-2 bg-primary bg-grey-400-hover" id="new-product" data-bs-toggle="modal" data-bs-target="#staticmodal"><span class="ps-2">Add New Product</span></a></div>`;
                const mainTable = `<table class="products table table-bordered table-striped hover" data-array="products" id="main-table">
                            <thead> </thead>
                            <tbody> </tbody>
                        </table>`;
                $('.middlemenu').html(' ');
                $('.middlemenu').append(heading);
                $('.middlemenu').append(mainTable);
                loadProductsPaginate(1);
        }
        if (e.target.id === 'product-save-btn') {
            const barLoader = $(e.target).closest('.modal-content').find('.loader-wrapper');
            barLoader.removeClass('d-none');
            let formData = new FormData();
            let title = $('#title').val(), subtitle= $("#subtitle").val(), text = $('#text').val();
            if (title) {
                formData.append('title', title)
            } else {
                $('.toaster').html(anyError('Title is required !'));
                return 0;
            }
            if (subtitle) {
                formData.append('sub_title', subtitle)
            }
            if (text) {
                formData.append('text', text)
            } else {
                $('.toaster').html(anyError('Please give TextData !'));
                return 0;
            }
            const image = $('#previewBox img');
            if (image.length === 0) {
                $('.toaster').html(anyError('Image required !'));
                return 0;
            }
            if (image.hasClass('previousImg')) {
                $('.toaster').html(anyError('Image already Uploaded ! Please select another one.'));
                return 0;
            } else {
                const base64String = image[0].src.split(',')[1];
                const byteCharacters = atob(base64String);
                const byteNumbers = new Array(byteCharacters.length).fill().map((_, i) => byteCharacters.charCodeAt(i));
                const byteArray = new Uint8Array(byteNumbers);
                const blob = new Blob([byteArray], { type: 'image/jpeg' });
                formData.append('image', blob, 'image.jpg');
            }
            $.ajax({
                url: "store-product",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (res) {
                    if (res.success) {
                        $('#staticmodal').modal('hide');
                        $('.toaster').html(anySuccess(res.message));
                        addedOrUpdatedProduct(res.data);
                    }
                }
            });
        }
        if (e.target.id === 'product-update-btn') {
            const barLoader = $(e.target).closest('.modal-content').find('.loader-wrapper');
            barLoader.removeClass('d-none');
            let formData = new FormData();
            let productId = $('#product-update-btn').data('id'), title = $('#title').val(), subtitle = $('#subtitle').val(), text = $('#text').val();
            if (title) {
                formData.append('id', productId);
                formData.append('title', title);
            } else {
                $('.toaster').html(anyError('Title is required !'));
                return 0;
            }
            if (subtitle) {
                formData.append('sub_title', subtitle)
            }
            if (text) {
                formData.append('text', text)
            } else {
                $('.toaster').html(anyError('Please give TextData !'));
                return 0;
            }
            const image = $('#previewBox img');
            if (image.length === 0) {
                $('.toaster').html(anyError('Image required !'));
                return 0;
            }
            if (image.hasClass('previousImg')) {
                formData.append('previousImage', image[0].src);
            } else {
                const base64String = image[0].src.split(',')[1];
                const byteCharacters = atob(base64String);
                const byteNumbers = new Array(byteCharacters.length).fill().map((_, i) => byteCharacters.charCodeAt(i));
                const byteArray = new Uint8Array(byteNumbers);
                const blob = new Blob([byteArray], { type: 'image/jpeg' });
                formData.append('image', blob, 'image.jpg');
            }
            $.ajax({
                url: "update-product",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (res) {
                    if (res.success) {
                        $('#staticmodal').modal('hide');
                        $('.toaster').html(anySuccess(res.message));
                        addedOrUpdatedProduct(res.data);
                    }
                }
            });
        }
        if ($(e.target).closest('.delete-product').length) {
            const tr = $(e.target).closest('tr');
            const dataId = tr.data('id');
            if (confirm('Are you sure to Delete this?')) {
                $.ajax({
                    url: '/delete-product',
                    type: 'POST',
                    data: { id: dataId },
                    success: function (response) {
                        if (response.success) {
                            tr.remove();
                            products = products.filter(p => p.id !== dataId);
                            $('.toaster').html(anySuccess(response.message));
                        } else {
                            $('.toaster').html(anyError(response.message));
                        }
                    },
                    error: function () {
                        $('.toaster').html(anyError(response.message));
                    }
                });
            }
        }
        if ($(e.target).closest('.change-product-status').length) {
            const tr = $(e.target).closest('tr');
            const dataId = tr.data('id');
            const statusBtn = $(e.target).closest('.change-product-status');
            const currentProduct = products.find((p) => p.id === dataId);

            let status = 1;
            let statusText = "Deactivate";
            if(Number(currentProduct.status)===1){
                status = 0;
                statusText= 'Activate';
            }
            $.ajax({
                url: '/change-product-status',
                type: 'POST',
                data: { id: dataId, status },
                success: function (response) {
                    if (response.success) {
                        statusBtn.text(statusText);
                        currentProduct.status = status;
                        $('.toaster').html(anySuccess(response.message));
                    } else {
                        $('.toaster').html(anyError(response.message));
                    }
                },
                error: function () {
                    $('.toaster').html(anyError(response.message));
                }
            });
        }
        //projects
        if ($(e.target).closest('.all-projects-btn').length && current_clicked !=='all-projects-btn') {
            current_clicked='all-projects-btn';
            const heading = `<div class="d-flex gap-4 pb-3 px-3 align-items-center justify-content-end"><p class="mb-0">Total <span id="total-row"></span></p><span id="total-details"></span>
            <a class="text-secondary cursor-pointer border border-1 border-secondary p-2 bg-primary bg-grey-400-hover" id="new-project" data-bs-toggle="modal" data-bs-target="#staticmodal"><span class="ps-2">Add New Project</span></a></div>`;
                const mainTable = ` <table class="table table-bordered table-striped hover" data-array="projects" id="main-table">
                            <thead> </thead>
                            <tbody> </tbody>
                        </table>`;
                $('.middlemenu').html(' ');
                $('.middlemenu').append(heading);
                $('.middlemenu').append(mainTable);
                loadProjectsPaginate(1);
        }
        if (e.target.id === 'project-save-btn') {
            const barLoader = $(e.target).closest('.modal-content').find('.loader-wrapper');
            barLoader.removeClass('d-none');
            let formData = new FormData();
            let title = $('#title').val(), category=$('#category').val(), text = $('#text').val();
            if (title) {
                formData.append('title', title)
            } else {
                $('.toaster').html(anyError('Title is required !'));
                return 0;
            }
            if (category) {
                formData.append('category', category)
            } else {
                $('.toaster').html(anyError('Category is required !'));
                return 0;
            }
            if (text) {
                formData.append('text', text)
            } else {
                $('.toaster').html(anyError('Please give TextData !'));
                return 0;
            }
            const image = $('#previewBox img');
            if (image.length === 0) {
                $('.toaster').html(anyError('Image required !'));
                return 0;
            }
            if (image.hasClass('previousImg')) {
                $('.toaster').html(anyError('Image already Uploaded ! Please select another one.'));
                return 0;
            } else {
                const base64String = image[0].src.split(',')[1];
                const byteCharacters = atob(base64String);
                const byteNumbers = new Array(byteCharacters.length).fill().map((_, i) => byteCharacters.charCodeAt(i));
                const byteArray = new Uint8Array(byteNumbers);
                const blob = new Blob([byteArray], { type: 'image/jpeg' });
                formData.append('image', blob, 'image.jpg');
            }
            $.ajax({
                url: "store-project",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (res) {
                    if (res.success) {
                        $('#staticmodal').modal('hide');
                        $('.toaster').html(anySuccess(res.message));
                        addedOrUpdatedProject(res.data);
                    }
                }
            });
        }
        if (e.target.id === 'project-update-btn') {
            const barLoader = $(e.target).closest('.modal-content').find('.loader-wrapper');
            barLoader.removeClass('d-none');
            let formData = new FormData();
            let projectId = $('#project-update-btn').data('id'), title = $('#title').val(), category=$('#category').val(), text = $('#text').val();
            if (title) {
                formData.append('id', projectId);
                formData.append('title', title);
            } else {
                $('.toaster').html(anyError('Title is required !'));
                return 0;
            }
            if (category) {
                formData.append('category', category)
            } else {
                $('.toaster').html(anyError('Category is required !'));
                return 0;
            }
            if (text) {
                formData.append('text', text)
            } else {
                $('.toaster').html(anyError('Please give TextData !'));
                return 0;
            }
            const image = $('#previewBox img');
            if (image.length === 0) {
                $('.toaster').html(anyError('Image required !'));
                return 0;
            }
            if (image.hasClass('previousImg')) {
                formData.append('previousImage', image[0].src);
            } else {
                const base64String = image[0].src.split(',')[1];
                const byteCharacters = atob(base64String);
                const byteNumbers = new Array(byteCharacters.length).fill().map((_, i) => byteCharacters.charCodeAt(i));
                const byteArray = new Uint8Array(byteNumbers);
                const blob = new Blob([byteArray], { type: 'image/jpeg' });
                formData.append('image', blob, 'image.jpg');
            }
            $.ajax({
                url: "update-project",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (res) {
                    if (res.success) {
                        $('#staticmodal').modal('hide');
                        $('.toaster').html(anySuccess(res.message));
                        addedOrUpdatedProject(res.data);
                    }
                }
            });
        }
        if ($(e.target).closest('.delete-project').length) {
            const tr = $(e.target).closest('tr');
            const dataId = tr.data('id');
            if (confirm('Are you sure to Delete this?')) {
                $.ajax({
                    url: '/delete-project',
                    type: 'POST',
                    data: { id: dataId },
                    success: function (response) {
                        if (response.success) {
                            tr.remove();
                            projects = projects.filter(p => p.id !== dataId);
                            $('.toaster').html(anySuccess(response.message));
                        } else {
                            $('.toaster').html(anyError(response.message));
                        }
                    },
                    error: function () {
                        $('.toaster').html(anyError(response.message));
                    }
                });
            }
        }
        if ($(e.target).closest('.change-project-status').length) {
            const tr = $(e.target).closest('tr');
            const dataId = tr.data('id');
            const statusBtn = $(e.target).closest('.change-project-status');
            const currentProject = projects.find((p) => p.id === dataId);

            let status = 1;
            let statusText = "Deactivate";
            if(Number(currentProject.status)===1){
                status = 0;
                statusText= 'Activate';
            }
            $.ajax({
                url: '/change-project-status',
                type: 'POST',
                data: { id: dataId, status },
                success: function (response) {
                    if (response.success) {
                        statusBtn.text(statusText);
                        currentProject.status = status;
                        $('.toaster').html(anySuccess(response.message));
                    } else {
                        $('.toaster').html(anyError(response.message));
                    }
                },
                error: function () {
                    $('.toaster').html(anyError(response.message));
                }
            });
        }
    });

    //static modal show, event handling
    $('#staticmodal').on('show.bs.modal', function (e) {
        var targetId = $(e.relatedTarget).attr('id');
        //service
        //new service btn
        if (targetId === 'new-service') {
            $('#staticmodal .modal-content').html(' ');
            $.ajax({
                url: 'service-modal',
                method: 'GET',
                data: { dataId:null, mode: 'add' },
                success: function (res) {
                    $('#staticmodal .modal-content').html(res);
                    let fields = [
                        { input: '#title', limit: 250 },
                        { input: '#text', limit: 500 },
                    ];
                    fields.forEach((field) => {
                        $(field.input).on('keyup', function (e) {
                            let remaining = field.limit - $(this).val().length;
                            let spanElement = $(this).closest('div').prev('label').find('.limit');
                            if (remaining >= 0) {
                                spanElement.text(`(Max ${field.limit} characters // ${remaining} remaining)`).removeClass('text-danger').addClass('text-success');
                            } else {
                                spanElement.text(`(Exceeded by ${Math.abs(remaining)} characters)`).removeClass('text-success').addClass('text-danger');
                            }
                        })
                    })
                }
            })
        }
        if (targetId === 'edit-service') {
            const tr = $(e.relatedTarget).closest('tr');
            const dataId = tr.data('id');
            $('#staticmodal .modal-content').html(' ');
            $.ajax({
                url: 'service-modal',
                method: 'GET',
                data: { dataId, mode: 'edit' },
                success: function (res) {
                    $('#staticmodal .modal-content').html(res);
                    let fields = [
                        { input: '#title', limit: 250 },
                        { input: '#text', limit: 500 },
                    ];
                    fields.forEach((field) => {
                        $(field.input).on('keyup', function (e) {
                            let remaining = field.limit - $(this).val().length;
                            let spanElement = $(this).closest('div').prev('label').find('.limit');
                            if (remaining >= 0) {
                                spanElement.text(`(Max ${field.limit} characters // ${remaining} remaining)`).removeClass('text-danger').addClass('text-success');
                            } else {
                                spanElement.text(`(Exceeded by ${Math.abs(remaining)} characters)`).removeClass('text-success').addClass('text-danger');
                            }
                        })
                    })
                }
            })
        }
        //product
        //new product btn
        if (targetId === 'new-product') {
            $('#staticmodal .modal-content').html(' ');
            $.ajax({
                url: 'product-modal',
                method: 'GET',
                data: { dataId:null, mode: 'add' },
                success: function (res) {
                    $('#staticmodal .modal-content').html(res);
                    let fields = [
                        { input: '#title', limit: 250 },
                        { input: '#subtitle', limit: 500 },
                        { input: '#text', limit: 1000 },
                    ];
                    fields.forEach((field) => {
                        $(field.input).on('keyup', function (e) {
                            let remaining = field.limit - $(this).val().length;
                            let spanElement = $(this).closest('div').prev('label').find('.limit');
                            if (remaining >= 0) {
                                spanElement.text(`(Max ${field.limit} characters // ${remaining} remaining)`).removeClass('text-danger').addClass('text-success');
                            } else {
                                spanElement.text(`(Exceeded by ${Math.abs(remaining)} characters)`).removeClass('text-success').addClass('text-danger');
                            }
                        })
                    })
                }
            })
        }
        if (targetId === 'edit-product') {
            const tr = $(e.relatedTarget).closest('tr');
            const dataId = tr.data('id');
            $('#staticmodal .modal-content').html(' ');
            $.ajax({
                url: 'product-modal',
                method: 'GET',
                data: { dataId, mode: 'edit' },
                success: function (res) {
                    $('#staticmodal .modal-content').html(res);
                    let fields = [
                        { input: '#title', limit: 250 },
                        { input: '#subtitle', limit: 500 },
                        { input: '#text', limit: 1000 },
                    ];
                    fields.forEach((field) => {
                        $(field.input).on('keyup', function (e) {
                            let remaining = field.limit - $(this).val().length;
                            let spanElement = $(this).closest('div').prev('label').find('.limit');
                            if (remaining >= 0) {
                                spanElement.text(`(Max ${field.limit} characters // ${remaining} remaining)`).removeClass('text-danger').addClass('text-success');
                            } else {
                                spanElement.text(`(Exceeded by ${Math.abs(remaining)} characters)`).removeClass('text-success').addClass('text-danger');
                            }
                        })
                    })
                }
            })
        }
        //projects
        //new project btn
        if (targetId === 'new-project') {
            $('#staticmodal .modal-content').html(' ');
            $.ajax({
                url: 'project-modal',
                method: 'GET',
                data: { dataId:null, mode: 'add' },
                success: function (res) {
                    $('#staticmodal .modal-content').html(res);
                    let fields = [
                        { input: '#title', limit: 250 },
                        { input: '#text', limit: 2000 },
                    ];
                    fields.forEach((field) => {
                        $(field.input).on('keyup', function (e) {
                            let remaining = field.limit - $(this).val().length;
                            let spanElement = $(this).closest('div').prev('label').find('.limit');
                            if (remaining >= 0) {
                                spanElement.text(`(Max ${field.limit} characters // ${remaining} remaining)`).removeClass('text-danger').addClass('text-success');
                            } else {
                                spanElement.text(`(Exceeded by ${Math.abs(remaining)} characters)`).removeClass('text-success').addClass('text-danger');
                            }
                        })
                    })
                }
            })
        }
        if (targetId === 'edit-project') {
            const tr = $(e.relatedTarget).closest('tr');
            const dataId = tr.data('id');
            $('#staticmodal .modal-content').html(' ');
            $.ajax({
                url: 'project-modal',
                method: 'GET',
                data: { dataId, mode: 'edit' },
                success: function (res) {
                    $('#staticmodal .modal-content').html(res);
                    let fields = [
                        { input: '#title', limit: 250 },
                        { input: '#text', limit: 2000 },
                    ];
                    fields.forEach((field) => {
                        $(field.input).on('keyup', function (e) {
                            let remaining = field.limit - $(this).val().length;
                            let spanElement = $(this).closest('div').prev('label').find('.limit');
                            if (remaining >= 0) {
                                spanElement.text(`(Max ${field.limit} characters // ${remaining} remaining)`).removeClass('text-danger').addClass('text-success');
                            } else {
                                spanElement.text(`(Exceeded by ${Math.abs(remaining)} characters)`).removeClass('text-success').addClass('text-danger');
                            }
                        })
                    })
                }
            })
        }
    })

    //file preview
    $('body').on('change', '#choosepostimage', function (e) {
        const previewBox = $('#previewBox');
        const files = e.target.files;
        Array.from(files).slice(0, 2).forEach(file => {
            selectedFiles.push(file);
            const reader = new FileReader();
            reader.onload = function (event) {
                const img = $('<img>').attr('src', event.target.result);
                const crossBtn = $('<span>').addClass('previewcrossbtn').text('✖');
                const previewImg = $('<div>').addClass('previewImg position-relative').append(img).append(crossBtn);
                previewImg.data('file', file);
                previewBox.append(previewImg);
            };
            reader.readAsDataURL(file);
        })

    });

    //crossBtn for preview files
    $('body').on('click', '.previewcrossbtn', function () {
        const previewImg = $(this).closest('.previewImg');
        const file = previewImg.data('file');
        selectedFiles = selectedFiles.filter(f => f !== file);
        previewImg.remove();
        updateInputField();
    });
})
let draggedId = null;
function onDragStart(e) {
    dragSrcEl = e.currentTarget;
    dragSrcEl.classList.add('dragging');
    e.dataTransfer.effectAllowed = 'move';
    e.dataTransfer.setData('text/html', dragSrcEl.outerHTML);
    draggedId = dragSrcEl.getAttribute('data-id');
}
function onDragOver(e) {
    e.preventDefault();
    e.dataTransfer.dropEffect = 'move';
    const target = e.currentTarget;
    const tbody = target.parentNode;
    const draggingRow = document.querySelector('.dragging');

    if (target !== draggingRow) {
        const bounding = target.getBoundingClientRect();
        const offset = bounding.y + (bounding.height / 2);
        if (e.clientY - offset > 0) {
            target.after(draggingRow);
        } else {
            target.before(draggingRow);
        }
    }
}
function onDrop(e) {
    const draggingRow = document.querySelector('.dragging');
    if (draggingRow) draggingRow.classList.remove('dragging');
    updateOrderAfterDrag();
}
function updateOrderAfterDrag() {    
    const rows = Array.from(document.querySelectorAll('#main-table tbody tr'));
    const arrayName = document.querySelector('#main-table').dataset.array;
    let dataArray = window[arrayName];
    
    const oldIndex = dataArray.findIndex(p => p.id == draggedId);
    const newIndex = rows.findIndex(row => row.getAttribute('data-id') == draggedId);
    if (newIndex === oldIndex) return;
    const minIndex = Math.min(oldIndex, newIndex);
    const maxIndex = Math.max(oldIndex, newIndex);
    const affectedRows = rows.slice(minIndex, maxIndex + 1);
    const slList = affectedRows.map(row => parseInt(row.getAttribute('data-sl')));
    const minSl = Math.min(...slList);
    
    let updatedArraySlice = [];
   affectedRows.forEach((row, i) => {
        const id = row.getAttribute('data-id');
        const sl = row.getAttribute('data-sl');
        const data = dataArray.find(p => p.id == id);
        if (data) {
            const newSl = minSl + i;
            if (data && data.sl !== newSl) {
                data.sl = newSl;
                row.setAttribute('data-sl', newSl); // update attribute if needed
                row.children[0].textContent = newSl; // update visual sl
                updatedArraySlice.push({ id: data.id, sl: newSl });
            }
        }
    });

    updatedArraySlice.forEach(u => {
        const index = window[arrayName].findIndex(item => item.id == u.id);
        if (index !== -1) {
            window[arrayName][index].sl = u.sl;
        }
    });
    console.log()
    saveRowOrder(updatedArraySlice, arrayName); // Optional: send to server
}

function saveRowOrder(updatedArraySlice, arrayName) {
    const payload = {
        arrayName: arrayName,
        order: updatedArraySlice.map(p => ({ id: p.id, sl: p.sl }))
    };
    $.ajax({
        url:'update-row-order',
        method:'POST',
        contentType: 'application/json',
        data:JSON.stringify(payload),
        success: (res)=>{
            if(res.success){
                let body = `<div class="toast-message">
                    <div class="d-flex align-items-center px-2">
                        <a class="px-2">
                            <i class="okey-icon icon-bg-green" style="zoom:1.3"></i>
                        </a>
                        <p class="text-secondary p-1 mb-0">
                        ${res.message}</p><a class="toasterHideBtn cursor-pointer d-flex text-warning px-1 bg-grey-400-hover rounded-circle">✖</a>
                    </div>
                </div>`;
                $('.toaster').html(body);
            }else{
                anyError(res.message);
            }
        },
        error: (err)=>{
            
        }
    })
}