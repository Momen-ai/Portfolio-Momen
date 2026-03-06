<x-mail::message>
# New Contact Message

You have received a new message from your portfolio website.

**From:** {{ $messageData['full_name'] }} ({{ $messageData['email'] }})  
**Phone:** {{ $messageData['phone'] ?? 'N/A' }}  
**Subject:** {{ $messageData['subject'] }}

**Message:**  
{{ $messageData['message'] }}

<x-mail::button :url="config('app.url') . '/dashboard/messages'">
View All Messages
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
