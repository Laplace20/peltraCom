<x-landingPageLayout>
    <x-slot:title>Home Page</x-slot>
    <x-aboutSection></x-aboutSection>
    <x-newsAndCsrSection :news="$news" :activities="$csrActivities"></x-newsAndCsrSection>
    <x-serviceSection :facilities="$facilities" ></x-serviceSection>
    <x-membersSection></x-membersSection>
    
</x-landingPageLayout>