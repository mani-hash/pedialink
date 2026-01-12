@extends('layout/auth')

@section('title')
    Verify Documents
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/pages/auth/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/auth/parent-verify.css') }}">
@endsection

@section('content')
    <div id="main">
        <div class="form-container">
            <div class="topic">
                @if ($submitted)
                    <h1>Documents submitted</h1>
                    <span class="text-muted">Your documents have been submitted</span>
                @else
                    <h1>Verify Documents</h1>
                    <span class="text-muted">Submit documents here</span>
                @endif
            </div>
    
            <c-card class="form-content">
                @if ($submitted)
                    <div class="submit-info">
                        Your documents have been submitted, wait until the admin verifies the documents
                    </div>
                    <div class="footer">
                        <c-link id="go-back" type="primary" href="{{ route('home') }}">
                            Go to Home
                        </c-link>
                    </div>
                @else
                    <form method="POST" action="{{ route('parent.document.submit') }}" id="verification-documents" enctype="multipart/form-data">
                        <div class="form-inputs">
                            <c-input
                                type="file"
                                label="Birth Certificate"
                                name="birth_certificate"
                                placeholder="Submit birth document"
                                error="{{ errors('birth_certificate_error') ?? '' }}"
                                required
                            />
                            <c-input
                                type="file"
                                label="Marriage Certificate"
                                name="marriage_certificate"
                                placeholder="Submit marriage document"
                                error="{{ errors('marriage_certificate_error') ?? '' }}"
                                required
                            />
                            <c-input
                                type="file"
                                label="NIC copy"
                                name="nic_copy"
                                placeholder="Submit NIC copy"
                                error="{{ errors('nic_copy_error') ?? '' }}"
                                required
                            />
                        </div>
                    </form>
                    <div class="footer">
                        <c-button id="submit-documents" form="verification-documents" type="submit" variant="primary">
                            Submit Documents
                        </c-button>
                    </div>
                @endif

            </c-card>
        </div>
    </div>
@endsection