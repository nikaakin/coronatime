<div class="shadow-card border-[1px] border-neutral-150  relative">
   <x-dashboard-table-header />

  <div class="max-h-150 overflow-y-scroll custom-scrollbar">
     @foreach ($countries as $country)
       <x-dashboard-column :country="$country" />
     @endforeach
  </div>
</div>