@extends('layouts.app')

@section('title', 'Create a Course')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<style>
    body {
        background-color: #f8fafc;
        color: #374151;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
    }

    .form-container {
        max-width: 900px;
        margin: 40px auto;
        background: #ffffff;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        border: 1px solid #e5e7eb;
    }

    .form-header {
        text-align: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid #e5e7eb;
    }

    .form-header h2 {
        color: #1f2937;
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    label {
        display: block;
        font-weight: 600;
        margin-bottom: 8px;
        color: #374151;
        font-size: 14px;
    }

    input[type="text"],
    input[type="number"],
    input[type="file"],
    textarea,
    select {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #d1d5db;
        background: #ffffff;
        color: #374151;
        margin-bottom: 16px;
        font-size: 14px;
        transition: all 0.2s ease;
    }

    input:focus,
    select:focus,
    textarea:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    textarea {
        height: 100px;
        resize: vertical;
    }

    button {
        border: none;
        border-radius: 8px;
        padding: 12px 20px;
        cursor: pointer;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .btn-primary {
        background: #2563eb;
        color: white;
    }

    .btn-primary:hover {
        background: #1d4ed8;
        transform: translateY(-1px);
    }

    .btn-secondary {
        background: #4b5563;
        color: white;
    }

    .btn-secondary:hover {
        background: #374151;
        transform: translateY(-1px);
    }

    .btn-danger {
        background: #dc2626;
        color: white;
    }

    .btn-danger:hover {
        background: #b91c1c;
        transform: translateY(-1px);
    }

    .btn-warning {
        background: #f59e0b;
        color: #000;
    }

    .btn-warning:hover {
        background: #d97706;
        transform: translateY(-1px);
    }

    hr {
        border: none;
        border-top: 1px solid #e5e7eb;
        margin: 30px 0;
    }

    .module {
        background: #f9fafb;
        border: 1px solid #e5e7eb;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        transition: all 0.2s ease;
    }

    .module:hover {
        border-color: #d1d5db;
    }

    .module-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        cursor: pointer;
    }

    .module-header h4 {
        color: #1f2937;
        font-size: 18px;
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .module-content {
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .module-content.collapsed {
        display: none;
    }

    .content-block {
        background: #ffffff;
        padding: 20px;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
        margin-bottom: 15px;
    }

    .content-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        cursor: pointer;
    }

    .content-header strong {
        color: #1f2937;
        font-size: 16px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .content-body {
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .content-body.collapsed {
        display: none;
    }

    .feature-upload {
        border: 2px dashed #d1d5db;
        text-align: center;
        padding: 30px;
        border-radius: 8px;
        color: #6b7280;
        cursor: pointer;
        position: relative;
        transition: all 0.2s ease;
    }

    .feature-upload:hover {
        border-color: #3b82f6;
        background: #f8fafc;
    }

    .feature-upload img {
        max-width: 100%;
        border-radius: 6px;
        margin-top: 15px;
        border: 1px solid #e5e7eb;
    }

    .actions {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #e5e7eb;
    }

    .nav-button {
        background: #4b5563;
        color: white;
        padding: 10px 18px;
        border-radius: 8px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-weight: 500;
        font-size: 14px;
        transition: all 0.2s ease;
        margin-bottom: 20px;
    }

    .nav-button:hover {
        background: #374151;
        transform: translateY(-1px);
        color: white;
        text-decoration: none;
    }

    .collapse-icon {
        transition: transform 0.3s ease;
    }

    .collapse-icon.rotated {
        transform: rotate(90deg);
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .form-container {
            margin: 20px;
            padding: 25px;
        }

        .actions {
            justify-content: center;
        }

        .module-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }

        input, select, textarea {
            font-size: 16px; /* Better for mobile */
        }
    }

    @media (max-width: 480px) {
        .form-container {
            margin: 10px;
            padding: 20px;
        }

        .actions {
            flex-direction: column;
        }

        .actions button {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@section('content')
    <div class="form-container">
        <div class="form-header">
            <h2><i class="fa fa-book"></i> Create a Course</h2>
        </div>
        <div style="text-align: left;">
            <a href="{{ route('courses.index') }}" class="nav-button">
                <i class="fa fa-list"></i> View My Courses
            </a>
        </div>

        <form id="courseForm" enctype="multipart/form-data">
            @csrf
            <label>Course Title *</label>
            <input type="text" id="courseTitle" name="title" placeholder="Enter course title" required>

            <label>Category *</label>
            <select id="category" name="category" required>
                <option value="">Choose a category...</option>
                <option value="Web Development">Web Development</option>
                <option value="Design">Design</option>
                <option value="Marketing">Marketing</option>
                <option value="Business">Business</option>
                <option value="Photography">Photography</option>
            </select>

            <label>Course Description</label>
            <textarea id="description" name="description"
                      placeholder="Describe what students will learn in this course..."></textarea>

            <label>Feature Video *</label>
            <input type="file" id="featureVideo" name="featureVideo" accept="video/*" required>
            <small style="color: #6b7280; font-size: 12px;">Supported formats: MP4, AVI, MOV, WMV (Max: 100MB)</small>

            <label>Feature Image</label>
            <div class="feature-upload" id="featureImageUpload">
                <i class="fa fa-cloud-upload-alt" style="font-size: 24px; margin-bottom: 10px;"></i>
                <div>Click or drag image here</div>
                <small style="color: #9ca3af; display: block; margin-top: 5px;">Recommended: 1280x720 pixels</small>
                <input type="file" id="featureImage" name="featureImage" accept="image/*" style="display:none;">
                <div id="previewImage"></div>
            </div>

            <hr>

            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <button type="button" id="addModule" class="btn-secondary">
                    <i class="fa fa-plus"></i> Add Module
                </button>
                <h3 style="color: #1f2937; margin: 0;">Course Modules</h3>
            </div>
            <div id="modulesContainer"></div>
            <hr>

            <div class="actions">
                <button type="button" id="cancelBtn" class="btn-danger">
                    <i class="fa fa-times"></i> Cancel
                </button>
                <button type="submit" class="btn-primary">
                    <i class="fa fa-save"></i> Save Course
                </button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        let moduleCount = 0;
        document.addEventListener('DOMContentLoaded', function () {
            addModule();
            setupEventListeners();
        });

        function setupEventListeners() {
            document.getElementById('featureImageUpload').addEventListener('click', function () {
                document.getElementById('featureImage').click();
            });

            document.getElementById('featureImage').addEventListener('change', function () {
                const file = this.files[0];
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        document.getElementById('previewImage').innerHTML = `
                    <div style="text-align: center; margin-top: 15px;">
                        <img src="${e.target.result}" alt="Preview" style="max-width: 200px; border-radius: 6px;">
                        <div style="margin-top: 10px;">
                            <button type="button" onclick="removeImage()" class="btn-danger" style="padding: 6px 12px; font-size: 12px;">
                                <i class="fa fa-times"></i> Remove Image
                            </button>
                        </div>
                    </div>
                `;
                    };
                    reader.readAsDataURL(file);
                }
            });

            document.getElementById('addModule').addEventListener('click', addModule);
            document.getElementById('courseForm').addEventListener('submit', handleFormSubmit);
            document.getElementById('cancelBtn').addEventListener('click', function () {
                if (confirm("Are you sure you want to cancel? All unsaved changes will be lost.")) {
                    window.location.href = "{{ route('courses.index') }}";
                }
            });
            document.addEventListener('blur', function (e) {
                if (e.target.matches('input, select, textarea')) {
                    validateField(e.target);
                }
            }, true);
        }

        function removeImage() {
            document.getElementById('featureImage').value = '';
            document.getElementById('previewImage').innerHTML = '';
        }

        function addModule() {
            moduleCount++;
            const moduleHTML = `
        <div class="module" data-module="${moduleCount}">
            <div class="module-header">
                <h4>
                    <i class="fa fa-chevron-right collapse-icon"></i>
                    Module ${moduleCount}
                </h4>
                <button type="button" class="btn-danger remove-module">
                    <i class="fa fa-times"></i> Remove Module
                </button>
            </div>
            <div class="module-content">
                <input type="text" class="module-title" name="modules[${moduleCount}][title]" placeholder="Enter module title" required>
                <div class="contents" id="contents-${moduleCount}"></div>
                <button type="button" class="btn-warning add-content" data-module="${moduleCount}">
                    <i class="fa fa-plus"></i> Add Content
                </button>
            </div>
        </div>`;

            document.getElementById('modulesContainer').insertAdjacentHTML('beforeend', moduleHTML);
            addContent(moduleCount);
        }

        function addContent(moduleId) {
            const contentsDiv = document.getElementById(`contents-${moduleId}`);
            const contentCount = contentsDiv.children.length;

            const contentHTML = `
        <div class="content-block">
            <div class="content-header">
                <strong>
                    <i class="fa fa-chevron-right collapse-icon"></i>
                    Content ${contentCount + 1}
                </strong>
                <button type="button" class="btn-danger remove-content">
                    <i class="fa fa-times"></i> Remove
                </button>
            </div>
            <div class="content-body">
                <label>Content Title *</label>
                <input type="text" class="content-title" name="modules[${moduleId}][contents][${contentCount}][title]" placeholder="Enter content title" required>
                <label>Upload Video File *</label>
                <input type="file" class="content-video" name="modules[${moduleId}][contents][${contentCount}][video]" accept="video/*" required>
                <small style="color: #6b7280; font-size: 12px;">Supported formats: MP4, AVI, MOV, WMV (Max: 100MB)</small>
                <label>Video Length (HH:MM:SS)</label>
                <input type="text" class="content-length" name="modules[${moduleId}][contents][${contentCount}][length]" placeholder="00:00:00">
            </div>
        </div>`;

            contentsDiv.insertAdjacentHTML('beforeend', contentHTML);
        }

        function handleFormSubmit(e) {
            e.preventDefault();
            clearErrors();
            if (!validateForm()) {
                showToast('Please fix the validation errors', 'error');
                return;
            }

            const submitBtn = e.target.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saving Course...';
            submitBtn.disabled = true;
            const formData = new FormData(document.getElementById('courseForm'));
            fetch("{{ route('courses.store') }}", {
                method: "POST",
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(err => {
                            throw err;
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        showToast(data.message, 'success');
                        setTimeout(() => {
                            window.location.href = data.redirect;
                        }, 1500);
                    } else {
                        throw new Error(data.message || 'Unknown error occurred');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);

                    if (error.errors) {
                        showFieldErrors(error.errors);
                        showToast('Please fix the validation errors', 'error');
                    } else {
                        showToast(error.message || 'Failed to create course. Please try again.', 'error');
                    }
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                });
        }

        function validateForm() {
            let isValid = true;
            const requiredFields = document.querySelectorAll('input[required], select[required]');
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    showFieldError(field, 'This field is required');
                    isValid = false;
                }
            });
            const modules = document.querySelectorAll('.module');
            if (modules.length === 0) {
                showToast('Please add at least one module', 'error');
                isValid = false;
            }
            modules.forEach(module => {
                const contents = module.querySelectorAll('.content-block');
                if (contents.length === 0) {
                    showToast('Each module must have at least one content', 'error');
                    isValid = false;
                }
            });

            return isValid;
        }

        function validateField(field) {
            const value = field.value.trim();
            clearFieldError(field);
            if (field.hasAttribute('required') && !value) {
                showFieldError(field, 'This field is required');
                return;
            }
            if (field.name === 'title' && value && value.length < 3) {
                showFieldError(field, 'Title must be at least 3 characters');
            }
        }

        function showFieldError(field, message) {
            field.classList.add('error-border');
            const errorDiv = document.createElement('div');
            errorDiv.className = 'error';
            errorDiv.textContent = message;
            field.parentNode.insertBefore(errorDiv, field.nextSibling);
        }

        function clearFieldError(field) {
            field.classList.remove('error-border');
            const errorDiv = field.parentNode.querySelector('.error');
            if (errorDiv) {
                errorDiv.remove();
            }
        }

        function clearErrors() {
            document.querySelectorAll('.error').forEach(error => error.remove());
            document.querySelectorAll('.error-border').forEach(field => field.classList.remove('error-border'));
        }

        function showFieldErrors(errors) {
            clearErrors();
            Object.keys(errors).forEach(fieldName => {
                const field = document.querySelector(`[name="${fieldName}"]`);
                if (field) {
                    showFieldError(field, errors[fieldName][0]);
                }
            });
        }

        function showToast(message, type = 'success') {
            const backgroundColor = type === 'success' ? '#10b981' : '#dc2626';
            Toastify({
                text: message,
                duration: 5000,
                gravity: "top",
                position: "right",
                backgroundColor: backgroundColor,
                stopOnFocus: true,
                style: {
                    borderRadius: '8px',
                    fontWeight: '500'
                }
            }).showToast();
        }

        document.addEventListener('click', function (e) {
            if (e.target.closest('.remove-module')) {
                e.target.closest('.module').remove();
            }
            if (e.target.closest('.remove-content')) {
                e.target.closest('.content-block').remove();
            }
            if (e.target.closest('.add-content')) {
                const moduleId = e.target.closest('.add-content').dataset.module;
                addContent(moduleId);
            }

            if (e.target.closest('.module-header')) {
                const moduleHeader = e.target.closest('.module-header');
                const moduleContent = moduleHeader.nextElementSibling;
                const collapseIcon = moduleHeader.querySelector('.collapse-icon');

                moduleContent.classList.toggle('collapsed');
                collapseIcon.classList.toggle('rotated');
            }
            if (e.target.closest('.content-header')) {
                const contentHeader = e.target.closest('.content-header');
                const contentBody = contentHeader.nextElementSibling;
                const collapseIcon = contentHeader.querySelector('.collapse-icon');

                contentBody.classList.toggle('collapsed');
                collapseIcon.classList.toggle('rotated');
            }
        });
    </script>
@endsection
