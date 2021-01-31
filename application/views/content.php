<div class="wrapper">
    <div class="header">
        <div class="top-block">

        </div>

        <div class="info-block">

            <form action="/record" method="post">
                <input type="datetime" name="start_time" require>
                <input type="datetime" name="finish_time" require>
                <input type="number" min="0" name="distance" require>
                <select name="activity" id="">
                    <option disabled selected>select</option>
                    <option>Run</option>
                </select>
                <button>Save</button>
            </form>
        </div>
    </div>


    <div class="content">
        <div class="info-left">
        
        </div>

        <div class="info-right">
            <div class="top"></div>
            <div class="bottom"></div>
        </div>

    </div>


 </div>


