<x-app-layout>
  <x-slot name="header">
    {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2> --}}
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
      <div id="tagContainer" class="overflow-hidden px-1 md:px-5 md:py-10" data-tags={{$tags}}>
        <h2 id="charHeader" class="font-medium text-xl pb-2 pl-1"></h2>
        <div id="tagGroup" class="flex flex-wrap gap-2 pb-5">
          <a id="tagEl" class="btn btn-outline btn-sm " href=""></a>
        </div>
      </div>
    </div>
  </div>

  <x-slot name="footerScripts">
    <script>
      const tagContainer = document.getElementById("tagContainer");
      const sortedTags = JSON.parse( tagContainer.dataset.tags );
      groupedTags = sortedTags.reduce((prev, tag) => {
        if(!(Array.from(tag.title)[0] in prev)) { prev[Array.from(tag.title)[0]] = [] }
        prev[Array.from(tag.title)[0]].push(tag);
        return prev;
      }, {})
      for( charGroup in groupedTags ) {
        let charHeader = document.getElementById("charHeader").cloneNode(false);
        charHeader.removeAttribute('id');
        charHeader.textContent = charGroup;
        tagContainer.appendChild(charHeader)
        let tagGroup = document.getElementById('tagGroup').cloneNode(false);
        tagGroup.removeAttribute('id');
        groupedTags[charGroup].forEach(tag => {
          let tagEl = document.getElementById('tagEl').cloneNode(false);
          tagEl.removeAttribute('id');
          tagEl.href = "/tags/" + tag.id;
          tagEl.textContent = '#' + tag.title;
          tagGroup.appendChild(tagEl);
        });
        tagContainer.appendChild(tagGroup);
      }
      tagContainer.removeChild(document.getElementById("charHeader"));
      tagContainer.removeChild(document.getElementById("tagGroup"));
    </script>
  </x-slot>
</x-app-layout>