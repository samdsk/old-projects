const Discord = require("discord.js");
const fs = require("fs");
const ffmpeg = require("ffmpeg");
var txtomp3 = require("text-to-mp3");
const bot = new Discord.Client();
const default_Config = require("./bot_boss/default_config.json");

const tokenFile = require("./bot_boss/tokenFile.json");

/* BOT START*/
bot.on("error", (e) => console.error(e));
bot.on("warn", (e) => console.warn(e));
//bot.on("debug", (e) => console.info(e));

bot.commands = new Discord.Collection();
const commandFiles = fs.readdirSync('./boss_commands').filter(file => file.endsWith('.js'));
console.log("Loading commands...")
for (const file of commandFiles) {
    console.log(file)
    const command = require(`./boss_commands/${file}`);
    bot.commands.set(command.name, command);
}

// READY EVENT
bot.on('ready', async () => {
  console.log(bot.user.username + " is READY!");
	bot.user.setStatus('Online');
    bot.user.setStatus('available');
    bot.user.setPresence({
        game: {
            name: '_boss if you want to be listen',
            type: "STREAMING",
            url: "https://www.twitch.tv/monstercat"
        }
	});

});

var VARSET = {
  guildID : null,
	moveRole : default_Config.moverole,
	adminRole : default_Config.adminRole,
	memberRole : default_Config.memberRole,
	modRole : default_Config.modRole,
	prisonChannel : default_Config.prison,
	BOTID : bot.id,
	cooldown :  default_Config.cooldown,
	secs : default_Config.secs,
	ADMINID : default_Config.ADMINID,
	botCommand : default_Config.botcmd,
  prefix: default_Config.prefix
}


let guildArray = bot.guilds.array();

bot.on("guildCreate", guild => {
    console.log("Joined a new guild: " + guild.name);
		let guildName = guild.name;
		let guildID = guild.id;
		const bot_config = require("./bot_boss/config.json");

		if(!(guildID in bot_config)){
			fs.readFile("bot_boss/config.json", "utf8" ,function(err, data){
				if (err){ console.log(err);
				}else{
					var json = JSON.parse(data);

					json[guildID] = {
						"serverName" : guildName,
						"prefix" : "+",
						"botCmd" : null,
						"moveRole" : null,
						"memberRole": null,
						"prisonChannel":null,
						"adminRole":null,
						"modRole":null
					}

					fs.writeFile("bot_boss/config.json", JSON.stringify(json,null,4), function(err){
						if (err){
							throw err;
						}else{console.log('The file has been saved and updated with a new guild')}
					});
					return delete require.cache[require.resolve('./bot_boss/config.json')];
				}
			});
		}else{
			delete require.cache[require.resolve('./bot_boss/config.json')];
			console.log("Server found: "+guildName);
			return;
		}
})

bot.on("guildDelete", guild => {
    console.log("Left a guild: " + guild.name);
		let guildName = guild.name;
		let guildID = guild.id;
		const bot_config = require("./bot_boss/config.json");


		if((guildID in bot_config)){
			fs.readFile("bot_boss/config.json", "utf8" ,function(err, data){
				if (err){ console.log(err);
				}else{
					var json = JSON.parse(data);

					delete json[guildID];

					fs.writeFile("bot_boss/config.json", JSON.stringify(json,null,4), function(err){
						if (err){
							throw err;
						}else{console.log('The file has been saved and removed guild')}
					});
					return delete require.cache[require.resolve('./bot_boss/config.json')];
				}
			});
		}else{
			delete require.cache[require.resolve('./bot_boss/config.json')];
			console.log("Server not found: "+guildName);
			return;
		}
});


// VOICE CHANNEL VOICE ANNOUNCEMENTS --START
let spam = false;
bot.on('voiceStateUpdate', (oldMember, newMember) => {
  let newUserChannel = newMember.voiceChannel;
  let oldUserChannel = oldMember.voiceChannel;

	let channel = bot.channels.get(newMember.voiceChannelID);

  if(oldUserChannel == undefined && newUserChannel !== undefined) {

  }else if(newUserChannel == undefined){
		if(newMember.user.username == "The Big Boss") return console.log("It was me!");
  }

	if(oldUserChannel != newUserChannel){
		if(newMember.user.username == "The Big Boss") return console.log("It's me THE BOSS!");
		let vC = newUserChannel;

		if(channel == undefined) return;
    if(channel == 'Prison' || channel == 'Released') return;
		let userName;
		let nickcheck = newMember.nickname;

		console.log("nickcheck: "+nickcheck);

		if(nickcheck != null){
			userName = newMember.nickname;

			if(textCheck(userName)) userName = newMember.user.username;
		}else{
			userName = newMember.user.username;
		}

		if(textCheck(userName)) return console.log("nickname invalide to tts!");
		if(userName == null || userName == undefined) return;
		console.log(userName + " Joined: " + channel.name);

		if(oldMember != newMember){
			if(spam == false){
				txtomp3.saveMP3(userName +" joined the channel", "join.mp3", function(err, absoluteFilePath){
				  if(err){ return console.log(err);}
					spam = true;
				  console.log("File saved :", absoluteFilePath);
				});
			}else{return console.log("you are doing too much!");}

			channel.join().then(connection => {
				console.log('Connected');
				const dispatcher = connection.playFile('./join.mp3');

				dispatcher.on("end", end => {
					console.log("playing");

					setTimeout(() => {
						channel.leave();
						console.log("left");
						spam = false;
					}
					,VARSET.secs*1000);
				});
			}).catch(console.error);

		}

	}

});
// VOICE CHANNEL VOICE ANNOUNCEMENTS --END


// BOT PROCESSING MSG EVENTS
bot.on("message", message => {

  if(message.author.bot) return;
  if(message.channel.type == "dm") return;

  const config = require("./bot_boss/config.json");
  let guildID = message.channel.guild.id;

  if (config[guildID]){
    VARSET = config[guildID];
    VARSET.guildID = guildID;
    VARSET.moveRole = config[guildID].moveRole;
    VARSET.adminRole = config[guildID].adminRole;
    VARSET.memberRole = config[guildID].memberRole;
    VARSET.modRole = config[guildID].modRole;
    VARSET.prisonChannel = config[guildID].prisonChannel;
    VARSET.prefix = config[guildID].prefix;
    VARSET.botCommand = config[guildID].botCmd;
  }else{
    console.log("WARNING: couldn't find guild, continue with default VARSET!");
  }

	if(message.channel.id == VARSET.botCommand){
		if(message.pinned == false){
			setTimeout(() => {
				message.delete(2000);
			}
			,VARSET.secs*1000);
		}
	}



	let prefix = default_Config.prefix;
	let messageArray = message.content.split(" ");
	let cmd = messageArray[0].slice(1,messageArray[0].length).toLowerCase();
	let args = messageArray.slice(1);

  if(!message.content.startsWith(prefix)) return;
  if(!bot.commands.has(cmd)) return message.reply("Error: What the heck are you talking about?");;

  try {
    bot.commands.get(cmd).execute(bot, message, args, VARSET);
  }
  catch (error) {
    console.error(error);
    message.reply("Error: Hey you! what did you say?");
  }

});

function textCheck(t){
	let regexp = /[^a-zA-Z0-9\s]/;
	return regexp.test(t);
}

bot.login(tokenFile.token);
