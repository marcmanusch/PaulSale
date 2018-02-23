{extends file="parent:backend/_base/layout.tpl"}

{block name="content/main"}
    <div class="page-header">
        <h1>Laufende Rabatte</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
{*
                <th>Löschen</th>
*}
                <th>Gültig von</th>
                <th>Gültig bis</th>
                <th>Kategorie-ID</th>
                <th>Prozente</th>
            </tr>
            </thead>
            <tbody>




            {foreach $sales as $entryie}

                <tr>
{*                    <td>

                        <form method="post"
                              class="form-horizontal"
                              action="{url controller="PaulSaleBackendController" action="delete"}"
                              onsubmit="return confirm('Wirklich löschen?');">

                            <button class="form-control" id="windowTitle" name="delete" value="{$entryie.id}">
                                Löschen
                            </button>
                        </form>

                    </td>*}
                    <td>{$entryie.validFrom}</td>
                    <td>{$entryie.validTill}</td>
                    <td>({$entryie.saleCategoryId}) {$entryie.description}</td>
                    <td>{$entryie.salePercentage} %</td>

                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>
{/block}