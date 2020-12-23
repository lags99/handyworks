@component('mail::message')
# We have reviewed your profile

Upon carefully reviewing your documents, we want to sit down with you and discuss further the details of our agreement. 

Please see schedule below:

**Date & Time**: {{ $user->formatDate($user->interview->interview_date) }}

**Address**: 5036  Barfield Lane, Indianapolis, Indiana



Thanks,<br>
{{ config('app.name') }}
@endcomponent
