<x-landingPageLayout>
    <x-slot:title>Home Page</x-slot>
    <x-newsSection :news="$news" ></x-newsSection>
    <x-csrSection :activities="$csrActivities"></x-csrSection>
    <x-serviceSection :facilities="$facilities" ></x-serviceSection>
    <x-membersSection></x-membersSection>
    
</x-landingPageLayout>