{extends file="parent:backend/_base/layout.tpl"}

{block name="content/main"}
    <div class="page-header">
        <h1>Rabatte</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Gültig von</th>
                <th>Gültig bis</th>
                <th>Kategorie-ID</th>
                <th>Prozente</th>
            </tr>
            </thead>
            <tbody>

            {foreach $sales as $entryie}
                <tr>
                    <td>{$entryie.id}</td>
                    <td>{$entryie.validFrom}</td>
                    <td>{$entryie.validTill}</td>
                    <td>{$entryie.saleCategoryId}</td>
                    <td>{$entryie.salePercentage}</td>

                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>
{/block}