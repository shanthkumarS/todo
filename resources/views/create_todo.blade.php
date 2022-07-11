<x-app-layout></x-app-layout>
<div class="container">
    <div class="card-body">
        <form method="POST" action="{{ ($todo && $todo->subject) ? route('todo.update', $todo->id) : route('todo.store') }}">
            @csrf
            <div class="row mb-3">
                <label for="subject" class="col-md-4 col-form-label text-md-end">{{ __('Subject') }}</label>
                <div class="col-md-6">
                    <input
                        id="subject"
                        type="text"
                        class="form-control @error('subject') is-invalid @enderror"
                        name="subject"
                        value="{{ old('subject') ? old('subject') : ($todo ? $todo->subject : '') }}"
                        required
                        autocomplete="subject"
                        autofocus
                    >

                    @error('subject')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
                <div class="col-md-6">
                    <textarea
                        id="description"
                        rows=6
                        class="form-control @error('description') is-invalid @enderror"
                        name="description"
                        required autocomplete="description" autofocus>{{ old('description') ? old('description') : ( ($todo && $todo->description) ? $todo->description : '' )}}</textarea>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>
                <div class="col-md-6">
                    <select
                        id="status"
                        class="form-control @error('status') is-invalid @enderror"
                        name="status"
                        required
                        autocomplete="status"
                    >
                        @foreach(Config::get('app.status') as $key => $status)
                            <option value="{{ $key }}" {{($todo && $todo->status == $key)? 'selected' : ''}}>{{ $status }}</option>
                        @endforeach
                    </select>
                    @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Save') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
