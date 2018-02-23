{extends file="parent:backend/_base/layout.tpl"}

{block name="content/main"}
    <div class="page-header">
        <h1>Rabatte anlegen</h1>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title">Rabatt anlegen</h3></div>
        <div class="panel-body">

            <form method="post"
                  class="form-horizontal"
                  action="{url controller="PaulSaleBackendController" action="add"}">



                <div class="form-group">
                    <label for="windowTitle" class="col-sm-2 control-label">Kategorie</label>
                    <div class="col-sm-10">
                        <select name="saleCategoryId" class="form-control">
                            {foreach $shopCategories as $category}
                                <option value="{$category.id}">({$category.id}) {$category.description}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="windowTitle" class="col-sm-2 control-label">Rabatt in %</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="windowTitle" name="salePercentage" required
                               placeholder="7">
                    </div>
                </div>

                <div class="form-group">
                    <label for="windowTitle" class="col-sm-2 control-label">Gültig von</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="windowTitle" name="validFrom" required
                               placeholder="Von 2018-01-31">
                    </div>
                </div>

                <div class="form-group">
                    <label for="windowTitle" class="col-sm-2 control-label">Gültig bis</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="windowTitle" name="validTill" required
                               placeholder="Bis 2018-02-13">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">speichern</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
{/block}