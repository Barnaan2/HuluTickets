<div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Crew</h4>
                                <p class="card-description">Add the Crew here</p>
                                <form  action="/crew" enctype="multipart/form-data" method="post">
                                   @csrf
                                   <div class="my-2">
                                   
                                   <input type="text" name="First_Name" id="First_Name" class="form-control @error('First_Name') is-invalid @enderror" placeholder="First_Name" value="{{ old('First_Name') }}">
                                   @error('First_Name')
                                     <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                                 </div>
                       
                                 <div class="my-2">
                                   <input type="text" name="Last_Name" id="Last_Name" class="form-control @error('Last_Name') is-invalid @enderror" placeholder="Last_Name" value="{{ old('Last_Name') }}">
                                   @error('Last_Name')
                                     <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                                 </div>
                       
                                 <div class="my-2">
                                 
                                   <input type="text" name="Role" id="Role" class="form-control @error('Role') is-invalid @enderror" placeholder="Role" value="{{ old('Role') }}">
                                   @error('Role')
                                     <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                                 </div>
                       
                                 
                                 <div class="my-2">
                                 
                                   <input type="file" name="file" id="file" accept="Picture_Link/*" class="form-control @error('file') is-invalid @enderror">
                                   @error('file')
                                     <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                                 </div>
                       
                                 <div class="my-2">
                                   <textarea name="About" id="About" rows="6" class="form-control @error('About') is-invalid @enderror" placeholder="About Crew">{{ old('About') }}</textarea>
                                   @error('About')
                                     <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                                 </div>
                       
                                 <div class="my-2">
                                   <input type="submit" value="Add Crew" class="btn btn-primary">
                                 </div>


                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>