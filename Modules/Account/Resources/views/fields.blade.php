<!-- Gender Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender_id', 'Gender Id:') !!}
    {!! Form::number('gender_id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'Gender Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Address1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address1', 'Address1:') !!}
    {!! Form::text('address1', null, ['class' => 'form-control']) !!}
</div>

<!-- Address2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address2', 'Address2:') !!}
    {!! Form::text('address2', null, ['class' => 'form-control']) !!}
</div>

<!-- Postal Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('postal_code', 'Postal Code:') !!}
    {!! Form::text('postal_code', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', 'City:') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state', 'State:') !!}
    {!! Form::text('state', null, ['class' => 'form-control']) !!}
</div>

<!-- Country Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country_id', 'Country Id:') !!}
    {!! Form::number('country_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Mobile Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mobile', 'Mobile:') !!}
    {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
</div>

<!-- Secondaryemail Field -->
<div class="form-group col-sm-6">
    {!! Form::label('secondaryemail', 'Secondaryemail:') !!}
    {!! Form::text('secondaryemail', null, ['class' => 'form-control']) !!}
</div>

<!-- Vat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('VAT', 'Vat:') !!}
    {!! Form::text('VAT', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('userProfiles.index') !!}" class="btn btn-default">Cancel</a>
</div>
