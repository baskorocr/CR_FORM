@extends('template.dashboard')

@section('breadcrumbs')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Form CR</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Form CR</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Proposal List') }}
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User/Requester</th>
                                <th>Submission Date</th>
                                <th>Status DH</th>
                                <th>Status DIVH</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proposals as $proposal)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $proposal->user_request }}</td>
                                <td>{{ $proposal->created_at->format('d-m-Y') }}</td>
                                <td>
                                    @if ($proposal->status_dh === 'pending')
                                    <span class="badge badge-warning">Pending</span>
                                    @elseif ($proposal->status_dh === 'approved')
                                    <span class="badge badge-success">Approved</span>
                                    @elseif ($proposal->status_dh === 'rejected')
                                    <span class="badge badge-danger">Rejected</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($proposal->status_divh === 'pending')
                                    <span class="badge badge-warning">Pending</span>
                                    @elseif ($proposal->status_divh === 'approved')
                                    <span class="badge badge-success">Approved</span>
                                    @elseif ($proposal->status_divh === 'rejected')
                                    <span class="badge badge-danger">Rejected</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="approval-buttons"> 
                                        @if (Auth::user()->role->name == 'dh_it' && $proposal->status_dh === 'pending')
                                        <a href="{{ route('proposal.approveDH', $proposal->id) }}" class="btn btn-success btn-sm">Approve DH</a>
                                        <a href="{{ route('proposal.rejectDH', $proposal->id) }}" class="btn btn-danger btn-sm">Reject DH</a>
                                        @elseif (Auth::user()->role->name == 'dh_it' && $proposal->status_dh === 'approved')
                                        <span class="badge badge-success">Approved</span>
                                        @elseif (Auth::user()->role->name == 'dh_it' && $proposal->status_dh === 'rejected')
                                        <span class="badge badge-danger">Rejected</span>
                                        @endif

                                        @if (Auth::user()->role->name == 'supervisor' && $proposal->status_divh === 'pending')
                                        <a href="{{ route('proposal.approveDIVH', $proposal->id) }}" class="btn btn-success btn-sm">Approve DIVH</a>
                                        <a href="{{ route('proposal.rejectDIVH', $proposal->id) }}" class="btn btn-danger btn-sm">Reject DIVH</a>
                                        @elseif (Auth::user()->role->name == 'supervisor' && $proposal->status_divh === 'approved')
                                        <span class="badge badge-success">Approved</span>
                                        @elseif (Auth::user()->role->name == 'supervisor' && $proposal->status_divh === 'rejected')
                                        <span class="badge badge-danger">Rejected</span>
                                        @endif
                                    </div>
                                    <a href="{{ route('proposal.show', $proposal->id) }}" class="btn btn-primary btn-sm">Detail</a>
                                    <a href="{{ route('proposal.print', $proposal->id) }}" class="btn btn-info btn-sm">Print</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    // Function to toggle the visibility of the approval buttons
    function toggleApprovalButtons(status) {
        const approvalButtons = document.querySelectorAll('.approval-buttons');
        const dhApprovalButtons = document.querySelectorAll('.dh-approval-buttons');
        const divhApprovalButtons = document.querySelectorAll('.divh-approval-buttons');

        // Show approval buttons for the corresponding status
        if (status === 'pending') {
            approvalButtons.forEach(button => button.style.display = 'block');
            dhApprovalButtons.forEach(button => button.style.display = 'block');
            divhApprovalButtons.forEach(button => button.style.display = 'block');
        } else if (status === 'approved' || status === 'rejected') {
            approvalButtons.forEach(button => button.style.display = 'none');
            dhApprovalButtons.forEach(button => button.style.display = 'none');
            divhApprovalButtons.forEach(button => button.style.display = 'none');
        }
    }

    // Toggle the approval buttons based on the proposal status
    const proposalRows = document.querySelectorAll('tr');
    proposalRows.forEach(row => {
        const statusDH = row.querySelector('.status-dh').textContent.trim();
        const statusDIVH = row.querySelector('.status-divh').textContent.trim();

        // Show/hide buttons based on the status of DH and DIVH
        toggleApprovalButtons(statusDH);
        toggleApprovalButtons(statusDIVH);
    });
</script>
@endsection