<x-mail::message>
# Hi,
We have received a new recipe that we would like to have validated before publishing it on our website. The recipe details are as follows:<br><br>
As a food technologist, we trust your expertise in evaluating the recipe and ensuring it is safe and healthy for consumption. Your input would be greatly appreciated as we strive to provide our users with accurate and trustworthy information.<br><br>Please let us know if there are any changes or modifications that need to be made to the recipe. We would also like to receive any feedback or suggestions you may have on the recipe.<br>

<x-mail::button :url="$link">
    View Recipe
</x-mail::button>

Regards, {{ config('app.name') }} Admins. <br><br>

</x-mail::message>

