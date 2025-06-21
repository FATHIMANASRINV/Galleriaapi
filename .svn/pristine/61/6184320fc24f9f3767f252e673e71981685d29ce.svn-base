{if $box && $flashdata} 
{if $type }
{assign var="message_class" value="alert alert-success"}
{assign var="bg_class" value="bg-success"}
{assign var="icon_class" value="<svg class='flex-shrink-0 me-2 svg-success' xmlns='http://www.w3.org/2000/svg' height='1.5rem' viewBox='0 0 24 24' width='1.5rem' fill='#000000'><path d='M0 0h24v24H0V0zm0 0h24v24H0V0z' fill='none'/><path d='M16.59 7.58L10 14.17l-3.59-3.58L5 12l5 5 8-8zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z'/></svg>"}
{else}
{assign var="message_class" value="alert alert-danger"}
{assign var="bg_class" value="bg-danger"}
{assign var="icon_class" value='<svg class="flex-shrink-0 me-2 svg-danger" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="1.5rem" viewBox="0 0 24 24" width="1.5rem" fill="#000000"><g><rect fill="none" height="24" width="24"/></g><g><g><g><path d="M15.73,3H8.27L3,8.27v7.46L8.27,21h7.46L21,15.73V8.27L15.73,3z M19,14.9L14.9,19H9.1L5,14.9V9.1L9.1,5h5.8L19,9.1V14.9z"/><rect height="6" width="2" x="11" y="7"/><rect height="2" width="2" x="11" y="15"/></g></g></g></svg>'}
{/if}

{* <div class="{$message_class}" role="alert">
	<div class="{$bg_class} me-3 icon-item">
		<span class="fas {$icon_class} text-white fs-3"></span>
	</div>
	<p class="mb-0 flex-1">{$flashdata}.</p> 
	<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
</div> *}

<div class="{$message_class} alert-dismissible fade show">
	{$icon_class}
    {$flashdata}.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button>
</div>

{/if}