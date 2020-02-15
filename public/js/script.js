const DATA = "#add_data";
const SEARCH = "#search_data";
function addRow(key, value)
{
	if(key && value){
		$(DATA).append(
		`<tr onclick='removeEl(this)'>
			<td class="center key">
				${key.trim().replace(/<\/?[^>]+(>|$)/g, "")}
			</td>
			<td class="center value">
				${value.trim().replace(/<\/?[^>]+(>|$)/g, "")}
			</td>
		</tr>`);
	}else{
		alert("Either Key or Value has to be specified!");
		console.error("Either Key or Value has to be specified!");
	}
}

function removeEl(el)
{
	$(el).remove();
}

function sendAdd()
{
	let sendData = [];
	$(DATA).children().each((index, el) => {
		sendData.push(JSON.parse('{"' + $(el).find(".key").text().trim().replace(/<\/?[^>]+(>|$)/g, "") + '":"' + $(el).find(".value").text().trim().replace(/<\/?[^>]+(>|$)/g, "") + '"}'));
	});

	if(sendData.length){
		$.ajax({
			url: '/../public/add_record.php',
			type: 'POST',
			dataType: 'html',
			data: {
				data:sendData
			},
		})
		.done(function() {
			alert("New data was successfully added!");
		})
		.fail(function() {
		})
		.always(function() {
		});
	}else{
		alert("Data is empty!");
	}
	
}

function search(query)
{
	if(query){
		$.ajax({
			url: '/../public/search.php',
			type: 'POST',
			dataType: 'html',
			data: {
				query:query
			},
		})
		.done(function(res) {
			let rows = "";
			let k = "";
			res = JSON.parse(res);
			$(SEARCH).html('');
			let rowCount = 0;
			if(res.length === 0){
				$(SEARCH).append(`<h6 style='text-align:center'>No records were found.</h6>`);
				return;
			}
			for (let i in res){
				rows = "";
				rowCount = 0;
				for(let rowNumber in res[i]){
					rowCount++;
					if(rowCount<=2){
						k = Object.keys(res[i][rowNumber])[0];
						rows+=
						`<div class='row-flex'>
							<p class="search-key">
								${k.trim().replace(/<\/?[^>]+(>|$)/g, "")}
							</p>
							<p class="search-value">
								${res[i][rowNumber][k].trim().replace(/<\/?[^>]+(>|$)/g, "")}
							</p>
						</div>`;
					}else{
						rows+=
						`<div class='row-flex'>...</div>`;
						break;
					}
				}
				$(SEARCH).append(`<div class='el-${i} el-search' onclick='viewEl(${i})'>${rows}</div>`);
			}
		})
		.fail(function() {
		})
		.always(function() {
		});
	}else{
		alert("Query is empty!");
	}
	
}

function viewEl(ind){
	window.location="/public/view_record.php?id=" + ind;
}