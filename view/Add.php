<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
    <div class="row">
        <div class="col-7">
            <!-- input song name -->
            <div class="form-inline">
                <div class="md-form">
                    <input id="SongName" type="text" class="form-control">
                </div>
                <button id="Btn_SearchSong" type="button" class="btn btn-primary btn-sm">Search</button>
            </div>

            <div class="md-form">
                <textarea type="text" name="Context" id="resultArea" class="md-textarea form-control" rows="3"></textarea>
                <div class="form-inline">
                    <input id="Token" type="text" class="form-control">
                    <button id="Btn_Submit" type="button" class="btn btn-primary btn-sm">Add</button>
                </div>
            </div>

            <!-- song table -->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Singer</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody id="songTableContent">

                </tbody>
            </table>

        </div>



        <div id="LyricContainer" class="col-4 mt-5">

        </div>
    </div>
</div>