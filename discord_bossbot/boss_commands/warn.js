const Discord = require("discord.js");
const fs = require("fs");
const ms = require("ms");


let warns = JSON.parse(fs.readFileSync("./warns.json", "utf8"));

module.exports.run = async (bot, message, args) => {

	if(args.length === 0) return message.channel.send("Using: +warn @someone reason",{code : "css"});
	if(!message.member.hasPermission("MANAGE_MEMBERS")) return message.channel.send("- No you can't use warning module.",{code: "diff"});
	let wUser = message.guild.member(message.mentions.users.first()) || message.guild.members.get(args[0]);
	if(!wUser) return message.channel.send("- Couldn't find the user.",{code: "diff"});

	//if(wUser.hasPermission("MANAGE_MEMBERS")) return message.channel.send("- FUCK.",{code: "diff"});

	if(args[1] === undefined) return message.channel.send("- Specify a reason!",{code : "diff"});


	let reason = args.join(" ").slice(22);

	if(!warns[wUser.id]) warns[wUser.id] =  {

		warns : 0

	}


	warns[wUser.id].warns++;

	fs.writeFile("./warns.json", JSONstringify(warns), (err) => {
		if(err) console.log(err);
	});


	let warnEmbed = new Discord.RichEmbed()
	.setDescription("Reports: Warning")
	.setColor("#15f153")
	.addField("Warned User", wUser+" witch ID: "+wUser.id)
	.addField("Warned By", message.author+" With ID: "+ message.author.id)
	.addField("Warned in", message.channel)
	.addField("Time", message.createdAt)
	.addField("Reason", reason);


	let reportsChannel = message.guild.channels.find(channel => channel.name == "reports");
	if(!reportsChannel) return message.channel.send("- Counldn't find reports channel",{code : "diff"});

	reportsChannel.send(warnEmbed);


}




module.exports.help = {

	name: "warn"

}
